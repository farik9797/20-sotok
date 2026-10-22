#!/usr/bin/env python3
"""Выкладка на хостинг hoster.by по FTP (SSH нет).

Доступы берутся из password.md проекта и в командную строку не попадают:
скрипты lftp пишутся во временный файл с правами 600 и удаляются сразу после запуска.

  deploy.py ls <путь>                     — список файлов на сервере
  deploy.py old-upload                    — старый сайт (Joomla) из бэкапа → /www/old.20sotok.by
  deploy.py old-protect                   — пути в configuration.php, пароль на вход, noindex
  deploy.py wp-bundle <среда>             — собрать WordPress + тему + плагин + wp-config (staging|production)
  deploy.py wp-upload <папка-на-сервере>  — залить собранный комплект
  deploy.py wp-install <адрес> <папка>    — первичная установка: администратор, страницы, шаблоны, главная
"""
import base64
import json
import os
import pathlib
import re
import secrets
import shutil
import subprocess
import sys
import tarfile
import tempfile
import urllib.request

PROJECT = pathlib.Path(__file__).resolve().parents[3]
PASSWORDS = PROJECT / 'password.md'
BACKUP = PROJECT / 'backup' / 'old-joomla-2026-10-22' / 'files'
BUNDLE = PROJECT / '.deploy' / 'wordpress'
THEME = PROJECT / 'wp-theme' / 'sotok20'
HOME = '/var/www/h148939/data'          # домашний каталог аккаунта (из configuration.php старого сайта)
UA = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0 Safari/537.36'

# страницы сайта: заголовок, ярлык, родитель, шаблон
PAGES = [
    ('Главная', 'glavnaya', None, ''),
    ('О компании', 'o-kompanii', None, 'page-o-kompanii.php'),
    ('Услуги', 'uslugi', None, 'page-uslugi.php'),
    ('Тротуарная плитка и мощение', 'plitka', 'uslugi', 'page-plitka.php'),
    ('Премиальные газоны', 'gazon', 'uslugi', 'page-gazon.php'),
    ('Автополив и освещение', 'poliv', 'uslugi', 'page-poliv.php'),
    ('Дренаж и ливнёвка', 'drenazh', 'uslugi', 'page-drenazh.php'),
    ('Проекты', 'proekty', None, 'page-proekty.php'),
    ('Полезно знать', 'blog', None, 'page-blog.php'),
    ('Контакты', 'kontakty', None, 'page-kontakty.php'),
    ('Политика конфиденциальности', 'politika', None, 'page-politika.php'),
]


# ---------- доступы ----------
def section(title):
    text = PASSWORDS.read_text(encoding='utf-8')
    m = re.search(r'^## ' + re.escape(title) + r'.*?$(.*?)(?=^## |\Z)', text, re.S | re.M)
    if not m:
        sys.exit('в password.md нет раздела «%s»' % title)
    return dict(re.findall(r'^- ([^:]+):\s*(.+?)\s*$', m.group(1), re.M))


def ftp():
    c = section('FTP — хостинг 20sotok.by')
    return c['Хост'], c['Логин'], c['Пароль'], int(c.get('Порт', 21))


def lftp(commands, quiet=False):
    host, user, pw, port = ftp()
    fd, path = tempfile.mkstemp(suffix='.lftp')
    try:
        with os.fdopen(fd, 'w') as f:
            f.write('set ftp:ssl-allow no\nset net:timeout 30\nset net:max-retries 3\nset ftp:list-options -a\n')
            f.write('set cmd:fail-exit yes\nopen -u %s,%s -p %d %s\n' % (user, pw, port, host))
            f.write('\n'.join(commands) + '\nbye\n')
        os.chmod(path, 0o600)
        r = subprocess.run(['lftp', '-f', path], capture_output=True, text=True)
    finally:
        os.unlink(path)
    out = '\n'.join(l for l in (r.stdout + r.stderr).splitlines() if pw not in l)
    if r.returncode != 0:
        sys.exit('lftp: ошибка\n' + out[-1500:])
    if not quiet and out.strip():
        print(out)
    return out


def put_text(remote, text):
    fd, path = tempfile.mkstemp()
    with os.fdopen(fd, 'w', encoding='utf-8') as f:
        f.write(text)
    try:
        lftp(['put %s -o %s' % (path, remote)], quiet=True)
    finally:
        os.unlink(path)


def get_text(remote):
    tmp = tempfile.mkdtemp()
    try:
        lftp(['get %s -o %s/f' % (remote, tmp)], quiet=True)
        return pathlib.Path(tmp, 'f').read_text(encoding='utf-8', errors='replace')
    finally:
        shutil.rmtree(tmp)


# ---------- старый сайт ----------
OLD_DIR = '/www/old.20sotok.by'
OLD_EXCLUDE = [
    r'^cache/.+', r'^tmp/.+', r'^administrator/logs/.+', r'^administrator/cache/.+', r'^error_log$',
    r'^\.htaccess\.bak', r'^009b26b2149a\.php$',                       # обезвреженная закладка в корне
    r'^images/(up_\d+|cmd_\d+)\.php$', r'^images/s\d+\.php\.gif$',    # обезвреженные закладки в images
]


def old_upload():
    regex = ' '.join("--exclude '%s'" % x for x in OLD_EXCLUDE)
    lftp(['mirror -R --verbose=0 --parallel=6 %s %s %s' % (regex, BACKUP, OLD_DIR)])
    print('старый сайт залит в', OLD_DIR)


def old_protect(user='20sotok'):
    # 1. пути и адрес в configuration.php
    cfg = get_text(OLD_DIR + '/configuration.php')
    cfg = re.sub(r"(public \$log_path = ')[^']*'", r"\1%s/www/old.20sotok.by/administrator/logs'" % HOME, cfg)
    cfg = re.sub(r"(public \$tmp_path = ')[^']*'", r"\1%s/www/old.20sotok.by/tmp'" % HOME, cfg)
    cfg = re.sub(r"(public \$live_site = ')[^']*'", r"\1https://old.20sotok.by'", cfg)
    put_text(OLD_DIR + '/configuration.php', cfg)
    # 2. пароль на вход (Basic) — файл паролей вне корня сайта
    password = secrets.token_urlsafe(12)
    line = subprocess.run(['htpasswd', '-nbB', user, password], capture_output=True, text=True, check=True).stdout.strip()
    put_text('/.htpasswd-old', line + '\n')
    ht = get_text(OLD_DIR + '/.htaccess')
    ht = re.sub(r'# s20-protect-start.*?# s20-protect-end\n', '', ht, flags=re.S)
    block = ('# s20-protect-start — архив старого сайта: только по паролю и без индексации\n'
             'AuthType Basic\nAuthName "20sotok archive"\nAuthUserFile %s/.htpasswd-old\nRequire valid-user\n'
             '<IfModule mod_headers.c>\nHeader always set X-Robots-Tag "noindex, nofollow"\n</IfModule>\n'
             '# s20-protect-end\n' % HOME)
    put_text(OLD_DIR + '/.htaccess', block + ht)
    put_text(OLD_DIR + '/robots.txt', 'User-agent: *\nDisallow: /\n')
    with open(PASSWORDS, 'a', encoding='utf-8') as f:
        f.write('\n## Архив старого сайта old.20sotok.by — вход (Basic)\n- Логин: %s\n- Пароль: %s\n' % (user, password))
    print('configuration.php, .htaccess, .htpasswd и robots.txt обновлены; пароль записан в password.md')


# ---------- WordPress ----------
def wp_bundle(env, base='/', db_title='БД WordPress', install_ip=None):
    """base — папка сайта от корня домена ('/' или '/new/'); install_ip — с какого адреса разрешена установка."""
    db = section(db_title)
    if BUNDLE.exists():
        shutil.rmtree(BUNDLE)
    BUNDLE.parent.mkdir(parents=True, exist_ok=True)
    print('скачиваю WordPress ru_RU…')
    with urllib.request.urlopen('https://ru.wordpress.org/latest-ru_RU.tar.gz', timeout=120) as r:
        data = r.read()
    tmp = pathlib.Path(tempfile.mkdtemp())
    (tmp / 'wp.tgz').write_bytes(data)
    with tarfile.open(tmp / 'wp.tgz') as t:
        t.extractall(tmp)
    shutil.move(str(tmp / 'wordpress'), BUNDLE)
    shutil.rmtree(tmp)
    content = BUNDLE / 'wp-content'
    # лишнее из коробки: демо-плагины, старые темы по умолчанию
    for p in ('akismet', 'hello.php'):
        target = content / 'plugins' / p
        shutil.rmtree(target) if target.is_dir() else target.unlink(missing_ok=True)
    # оставляем одну, самую свежую тему по умолчанию как запасную (имена — словами: twentytwentyfive и т. п.)
    order = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine']
    year = lambda n: next((i for i, w in enumerate(order) if n.endswith('twenty' + w)), -1)
    defaults = sorted((d.name for d in (content / 'themes').iterdir() if d.is_dir() and d.name.startswith('twenty')), key=year)
    for d in defaults[:-1]:
        shutil.rmtree(content / 'themes' / d)
    shutil.copytree(THEME, content / 'themes' / 'sotok20', ignore=shutil.ignore_patterns('.DS_Store'))
    print('скачиваю Secure Custom Fields…')
    with urllib.request.urlopen('https://downloads.wordpress.org/plugin/secure-custom-fields.latest-stable.zip', timeout=120) as r:
        (BUNDLE.parent / 'scf.zip').write_bytes(r.read())
    shutil.unpack_archive(BUNDLE.parent / 'scf.zip', content / 'plugins')
    (BUNDLE.parent / 'scf.zip').unlink()
    salts = ''.join("define('%s', '%s');\n" % (k, secrets.token_urlsafe(48)) for k in
                    ('AUTH_KEY', 'SECURE_AUTH_KEY', 'LOGGED_IN_KEY', 'NONCE_KEY',
                     'AUTH_SALT', 'SECURE_AUTH_SALT', 'LOGGED_IN_SALT', 'NONCE_SALT'))
    esc = lambda v: v.replace('\\', '\\\\').replace("'", "\\'")
    (BUNDLE / 'wp-config.php').write_text(
        "<?php\n/* Конфигурация WordPress «20 соток» — собрана deploy.py. */\n"
        "define('DB_NAME', '%s');\ndefine('DB_USER', '%s');\ndefine('DB_PASSWORD', '%s');\n"
        "define('DB_HOST', '%s');\ndefine('DB_CHARSET', 'utf8mb4');\ndefine('DB_COLLATE', '');\n\n%s\n"
        "$table_prefix = 's20_';\n\n"
        "define('WP_ENVIRONMENT_TYPE', '%s');\ndefine('WP_DEBUG', false);\ndefine('WP_DEBUG_LOG', false);\n"
        "define('DISALLOW_FILE_EDIT', true);        // правка PHP из админки отключена\n"
        "define('FORCE_SSL_ADMIN', true);\ndefine('WP_AUTO_UPDATE_CORE', 'minor');\ndefine('WP_POST_REVISIONS', 10);\n\n"
        "if (!defined('ABSPATH')) define('ABSPATH', __DIR__ . '/');\nrequire_once ABSPATH . 'wp-settings.php';\n"
        % (esc(db['База']), esc(db['Пользователь']), esc(db['Пароль']), esc(db.get('Хост', 'localhost')), salts, env),
        encoding='utf-8')
    joomla = ('# адреса старого сайта на Joomla → главная\n'
              'RewriteCond %{QUERY_STRING} (^|&)option=com_ [NC]\nRewriteRule ^index\\.php$ /? [R=301,L]\n') if base == '/' else ''
    (BUNDLE / '.htaccess').write_text(
        '# BEGIN WordPress\n<IfModule mod_rewrite.c>\nRewriteEngine On\nRewriteBase %s\n'
        'RewriteRule ^index\\.php$ - [L]\n%s'
        'RewriteCond %%{REQUEST_FILENAME} !-f\nRewriteCond %%{REQUEST_FILENAME} !-d\nRewriteRule . %sindex.php [L]\n'
        '</IfModule>\n# END WordPress\n\n'
        '# защита служебных файлов\n<FilesMatch "^(wp-config\\.php|readme\\.html|license\\.txt|xmlrpc\\.php)$">\nRequire all denied\n</FilesMatch>\n'
        'Options -Indexes\n' % (base, joomla, base), encoding='utf-8')
    # установка WordPress открыта только с указанного адреса — чужой не перехватит установку
    if install_ip:
        (BUNDLE / 'wp-admin' / '.htaccess').write_text(
            '<Files "install.php">\nRequire ip %s\n</Files>\n<Files "setup-config.php">\nRequire all denied\n</Files>\n' % install_ip,
            encoding='utf-8')
    # одноразовая настройка сразу после установки: тема, плагин, страницы, главная
    mu = BUNDLE / 'wp-content' / 'mu-plugins'
    mu.mkdir(exist_ok=True)
    tpl = (pathlib.Path(__file__).parent / 's20-setup-mu.php').read_text(encoding='utf-8')
    (mu / 's20-setup.php').write_text(
        tpl.replace('%PAGES%', base64.b64encode(json.dumps(PAGES, ensure_ascii=False).encode()).decode()), encoding='utf-8')
    n = sum(1 for _ in BUNDLE.rglob('*') if _.is_file())
    print('комплект готов: %s (%d файлов)' % (BUNDLE.relative_to(PROJECT), n))


def wp_upload(remote_dir):
    lftp(['mirror -R --verbose=0 --parallel=6 --exclude-glob .DS_Store %s %s' % (BUNDLE, remote_dir)])
    print('WordPress залит в', remote_dir)


def wp_install(url, remote_dir, public=False):
    admin = section('WordPress — администратор')
    cfg = {'title': '20 соток', 'admin_user': admin['Логин'], 'admin_pass': admin['Пароль'],
           'admin_email': admin['E-mail'], 'public': 1 if public else 0, 'pages': PAGES}
    token = secrets.token_hex(16)
    name = '_s20_setup_%s.php' % secrets.token_hex(6)
    php = (pathlib.Path(__file__).parent / 'setup-site.php').read_text(encoding='utf-8')
    php = php.replace('%TOKEN%', token).replace('%CFG%', base64.b64encode(json.dumps(cfg, ensure_ascii=False).encode()).decode())
    remote = '%s/%s' % (remote_dir.rstrip('/'), name)
    put_text(remote, php)
    try:
        r = subprocess.run(['curl', '-s', '--max-time', '300', '-A', UA, '%s/%s?k=%s' % (url.rstrip('/'), name, token)],
                           capture_output=True, text=True)
        print(r.stdout.strip() or '(пустой ответ)')
    finally:
        lftp(['rm -f %s' % remote], quiet=True)
        print('установочный скрипт удалён с сервера')


# ---------- переключение основного домена ----------
ROOT_DIR = '/www/20sotok.by'
KEEP_IN_ROOT = {'.well-known', 'googlef134e039bc4ec49b.html', 'yandex_21e67eed46eb77d6.html', 'new'}   # подтверждения Google/Яндекса и SSL


def remote_entries(path):
    out = lftp(['cls -1a %s' % path], quiet=True)
    names = [l.rstrip('/').split('/')[-1] for l in out.splitlines() if l.strip()]
    return [n for n in names if n not in ('.', '..')]


def wp_promote(archive='/joomla-archive-2026-10-22', dry=False):
    """Joomla из корня — в архив вне www, WordPress из /new/ — в корень. Только переименования: быстро и обратимо."""
    joomla = [n for n in remote_entries(ROOT_DIR) if n not in KEEP_IN_ROOT]
    wp = remote_entries(ROOT_DIR + '/new')
    plan = ['mkdir -p %s' % archive]
    plan += ['mv %s/%s %s/%s' % (ROOT_DIR, n, archive, n) for n in joomla]
    plan += ['mv %s/new/%s %s/%s' % (ROOT_DIR, n, ROOT_DIR, n) for n in wp]
    plan += ['rmdir %s/new' % ROOT_DIR]
    log = PROJECT / 'backup' / 'promote-plan.txt'
    log.write_text('\n'.join(plan) + '\n', encoding='utf-8')
    print('в архив: %d записей Joomla; в корень: %d записей WordPress; план — %s' % (len(joomla), len(wp), log.relative_to(PROJECT)))
    if dry:
        return
    lftp(plan, quiet=True)
    # адреса и среда для корня домена
    ht = get_text(ROOT_DIR + '/.htaccess')
    ht = ht.replace('RewriteBase /new/', 'RewriteBase /').replace('RewriteRule . /new/index.php [L]', 'RewriteRule . /index.php [L]')
    ht = ht.replace('RewriteRule ^index\\.php$ - [L]\n',
                    'RewriteRule ^index\\.php$ - [L]\n'
                    '# адреса старого сайта на Joomla → главная\n'
                    'RewriteCond %{QUERY_STRING} (^|&)option=com_ [NC]\nRewriteRule ^index\\.php$ /? [R=301,L]\n'
                    'RewriteRule ^sitemap\\.xml$ /wp-sitemap.xml [R=301,L]\n', 1)
    put_text(ROOT_DIR + '/.htaccess', ht)
    cfg = get_text(ROOT_DIR + '/wp-config.php').replace("define('WP_ENVIRONMENT_TYPE', 'staging');", "define('WP_ENVIRONMENT_TYPE', 'production');")
    put_text(ROOT_DIR + '/wp-config.php', cfg)
    print('готово: WordPress в корне, .htaccess и wp-config переключены на основной домен')


if __name__ == '__main__':
    cmd, *args = sys.argv[1:] or ['help']
    if cmd == 'ls':
        lftp(['cls -la %s' % (args[0] if args else '/')])
    elif cmd == 'old-upload':
        old_upload()
    elif cmd == 'old-protect':
        old_protect()
    elif cmd == 'wp-bundle':
        # deploy.py wp-bundle <среда> [папка] [раздел-БД-в-password.md] [ip-для-установки]
        wp_bundle(args[0] if args else 'staging', args[1] if len(args) > 1 else '/',
                  args[2] if len(args) > 2 else 'БД WordPress', args[3] if len(args) > 3 else None)
    elif cmd == 'wp-promote':
        wp_promote(dry=bool(args and args[0] == 'dry'))
    elif cmd == 'wp-upload':
        wp_upload(args[0])
    elif cmd == 'wp-install':
        wp_install(args[0], args[1], public=len(args) > 2 and args[2] == 'public')
    else:
        print(__doc__)
