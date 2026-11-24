#!/usr/bin/env python3
"""Выкладка Laravel-копии на тестовый поддомен по FTP (SSH нет): deploy_laravel.py <команда> [поддомен].

Приложение лежит вне веб-папки (/laravel-20sotok), в /www/test.20sotok.by — только содержимое public/
с путями к приложению в index.php. База — SQLite, собирается локально (миграции, страницы, администратор)
и заливается файлом. Доступы FTP — из password.md через tools/wp-port/deploy/deploy.py.

  deploy_laravel.py bundle   — собрать .deploy/laravel-test: composer без dev, .env, база, администратор
  deploy_laravel.py probe    — версия PHP и расширения на поддомене (временный файл, удаляет себя)
  deploy_laravel.py upload   — залить приложение и public, убрать заглушку хостинга (--no-index — без index.php)
  deploy_laravel.py index    — залить .env и index.php (последний шаг)
  deploy_laravel.py check    — страницы, 404, редирект, заявка-ловушка, noindex
"""
import base64
import os
import pathlib
import re
import secrets
import shutil
import string
import subprocess
import sys
import urllib.request

PROJECT = pathlib.Path(__file__).resolve().parents[2]
sys.path.insert(0, str(PROJECT / 'tools' / 'wp-port' / 'deploy'))
import deploy  # noqa: E402  (lftp, доступы из password.md)

SRC = PROJECT / 'laravel'
BUNDLE = PROJECT / '.deploy' / 'laravel-test'
APP = BUNDLE / 'laravel-20sotok'
HOST = next((a for a in sys.argv[2:] if not a.startswith('--')), 'test.20sotok.by')   # поддомен — аргументом
URL = 'https://' + HOST
REMOTE_APP = '/laravel-20sotok'
REMOTE_WEB = '/www/' + HOST
PASS_SECTION = HOST + ' — Laravel-копия'
UA = deploy.UA

# с «/» в начале — только в корне приложения: без него rsync выкидывает и public/assets/js/vendor (GSAP)
EXCLUDE = ['/vendor', '/node_modules', '/.env', '/database/database.sqlite', 'storage/logs/*.log',
           'storage/framework/cache/data/*', 'storage/framework/sessions/*', 'storage/framework/views/*.php',
           'storage/app/private/livewire-tmp', 'public/uploads/site/*', 'bootstrap/cache/*.php', '/tests',
           'phpunit.xml', 'vite.config.js', 'package.json', '.npmrc', '.editorconfig', 'README.md', '.git*']


def run(cmd, cwd=APP):
    r = subprocess.run(cmd, cwd=cwd, capture_output=True, text=True)
    if r.returncode != 0:
        sys.exit('%s: ошибка\n%s' % (' '.join(cmd[:3]), (r.stdout + r.stderr)[-1500:]))
    return r.stdout


def secret(n=20):
    return ''.join(secrets.choice(string.ascii_letters + string.digits) for _ in range(n))


def remember(lines):
    """Доступы тестовой копии — в password.md (не в git), в вывод не попадают."""
    p = PROJECT / 'password.md'
    text = p.read_text(encoding='utf-8')
    text = re.sub(r'\n## ' + re.escape(PASS_SECTION) + r'.*?(?=\n## |\Z)', '', text, flags=re.S)
    p.write_text(text.rstrip('\n') + '\n\n## ' + PASS_SECTION + '\n' + ''.join('- %s: %s\n' % kv for kv in lines),
                 encoding='utf-8')


def bundle():
    if BUNDLE.exists():
        shutil.rmtree(BUNDLE)
    APP.mkdir(parents=True)
    run(['rsync', '-a'] + ['--exclude=' + e for e in EXCLUDE] + [str(SRC) + '/', str(APP) + '/'], cwd=PROJECT)

    key = 'base64:' + base64.b64encode(secrets.token_bytes(32)).decode()
    env = (SRC / '.env.example').read_text(encoding='utf-8')
    for k, v in [('APP_NAME', '"20 соток"'), ('APP_ENV', 'staging'), ('APP_KEY', key), ('APP_DEBUG', 'false'),
                 ('APP_URL', URL), ('APP_LOCALE', 'ru'), ('APP_FALLBACK_LOCALE', 'en'), ('LOG_LEVEL', 'debug'),
                 ('MAIL_MAILER', 'log')]:
        env, n = re.subn(r'^#?\s*%s=.*$' % k, '%s=%s' % (k, v), env, flags=re.M)
        if not n:
            env += '\n%s=%s\n' % (k, v)
    (APP / '.env').write_text(env, encoding='utf-8')

    run(['composer', 'install', '--no-dev', '--optimize-autoloader', '--no-interaction', '--quiet'])
    (APP / 'database' / 'database.sqlite').touch()
    run(['php', 'artisan', 'migrate', '--force', '--seed', '--no-interaction'])
    # логин и пароль генерируются при каждой сборке и пишутся только в password.md, в репозитории их нет
    email, password = 'admin-%s@20sotok.test' % secrets.token_hex(4), secret()
    run(['php', 'artisan', 'make:filament-user', '--name=Администратор', '--email=' + email,
         '--password=' + password, '--no-interaction'])
    # кэши с путями этого компьютера на сервер не везём
    for f in (APP / 'bootstrap' / 'cache').glob('*.php'):
        if f.name not in ('packages.php', 'services.php'):
            f.unlink()
    for d in ('framework/views', 'framework/cache/data', 'framework/sessions', 'logs'):
        for f in (APP / 'storage' / d).glob('*'):
            if f.name != '.gitignore':
                shutil.rmtree(f) if f.is_dir() else f.unlink()
    remember([('Адрес', URL), ('Админка', URL + '/admin'), ('Логин', email), ('Пароль', password),
              ('APP_KEY', key)])

    # public → корень поддомена: пути к приложению вне веб-папки
    pub = APP / 'public'
    idx = (pub / 'index.php').read_text(encoding='utf-8')
    idx = idx.replace("define('LARAVEL_START', microtime(true));",
                      "define('LARAVEL_START', microtime(true));\n\n"
                      "// приложение лежит вне веб-папки: /laravel-20sotok рядом с /www\n"
                      "$base = dirname(__DIR__, 2).'/laravel-20sotok';")
    idx = idx.replace("__DIR__.'/../storage/", "$base.'/storage/").replace("__DIR__.'/../vendor/", "$base.'/vendor/")
    idx = idx.replace("$app = require_once __DIR__.'/../bootstrap/app.php';",
                      "$app = require_once $base.'/bootstrap/app.php';\n$app->usePublicPath(__DIR__);")
    if idx.count('$base') != 4:
        sys.exit('index.php: пути не заменились')
    (pub / 'index.php').write_text(idx, encoding='utf-8')
    ht = (pub / '.htaccess').read_text(encoding='utf-8')
    (pub / '.htaccess').write_text(
        '# тестовая копия: поисковикам не индексировать\n<IfModule mod_headers.c>\n'
        '    Header always set X-Robots-Tag "noindex, nofollow"\n</IfModule>\n\n' + ht, encoding='utf-8')

    check = (APP / 'vendor' / 'composer' / 'platform_check.php').read_text(encoding='utf-8')
    need = re.search(r'PHP_VERSION_ID >= (\d+)', check)
    size = run(['du', '-sh', str(APP)], cwd=PROJECT).split()[0]
    print('комплект: %s, %s; нужен PHP >= %s' % (APP.relative_to(PROJECT), size,
                                                  need.group(1) if need else '?'))


def fetch(path, method='GET', data=None, headers=None):
    req = urllib.request.Request(URL + path, data=data, method=method, headers={'User-Agent': UA, **(headers or {})})
    try:
        r = urllib.request.urlopen(req, timeout=60)
        return r.status, dict(r.headers), r.read().decode('utf-8', 'replace')
    except urllib.error.HTTPError as e:
        return e.code, dict(e.headers), e.read().decode('utf-8', 'replace')


def probe():
    name = 's20-probe-%s.php' % secrets.token_hex(6)
    code = ("<?php header('Content-Type: text/plain');\n"
            "echo 'PHP ', PHP_VERSION, \"\\n\";\n"
            "foreach (['pdo_sqlite','sqlite3','mbstring','intl','fileinfo','openssl','tokenizer','xml','dom',"
            "'ctype','json','bcmath','curl','zip','gd','filter','session'] as $e) "
            "echo $e, ': ', extension_loaded($e) ? 'да' : 'НЕТ', \"\\n\";\n"
            "echo 'open_basedir: ', ini_get('open_basedir') ?: '—', \"\\n\";\n"
            "echo 'дом. каталог читается: ', is_dir(dirname(__DIR__, 2)) ? 'да' : 'нет', \"\\n\";\n"
            "@unlink(__FILE__);\n")
    deploy.put_text(REMOTE_WEB + '/' + name, code)
    status, _, body = fetch('/' + name)
    print('HTTP', status)
    print(body[:1500])
    # если PHP не выполнился, файл мог остаться — удаляем по FTP
    if name in ' '.join(deploy.remote_entries(REMOTE_WEB)):
        deploy.lftp(['rm %s/%s' % (REMOTE_WEB, name)], quiet=True)


def upload():
    entries = deploy.remote_entries(REMOTE_WEB)
    # заглушка хостинга (index.html) перебила бы index.php — переносим в архив, не удаляем
    stubs = [e for e in entries if e in ('index.html', 'index.htm')]
    if stubs:
        deploy.lftp(['mkdir -p /archive-2026-10-23/%s-stub' % HOST] +
                    ['mv %s/%s /archive-2026-10-23/%s-stub/%s' % (REMOTE_WEB, s, HOST, s) for s in stubs], quiet=True)
        print('заглушка в архиве:', ', '.join(stubs))
    deploy.lftp(['mirror -R --parallel=8 --no-perms --exclude-glob public/ %s %s' % (APP, REMOTE_APP)], quiet=True)
    # --no-index: всё, кроме index.php — сайт не запускается, пока на поддомене не та версия PHP
    skip = ' --exclude-glob index.php' if '--no-index' in sys.argv else ''
    deploy.lftp(['mirror -R --parallel=8 --no-perms%s %s %s' % (skip, APP / 'public', REMOTE_WEB)], quiet=True)
    print('залито: приложение → %s, public → %s%s' % (REMOTE_APP, REMOTE_WEB, ' (без index.php)' if skip else ''))


def index():
    """Последний шаг, когда PHP на поддомене подходит: .env (мог измениться) и index.php."""
    deploy.lftp(['put %s -o %s/.env' % (APP / '.env', REMOTE_APP),
                 'put %s -o %s/index.php' % (APP / 'public' / 'index.php', REMOTE_WEB)], quiet=True)
    print('.env и index.php залиты')


def check():
    pages = ['/', '/o-kompanii/', '/uslugi/', '/uslugi/plitka/', '/uslugi/gazon/', '/uslugi/poliv/',
             '/uslugi/drenazh/', '/proekty/', '/blog/', '/kontakty/', '/politika/']
    for p in pages + ['/net-takoj-stranicy/', '/admin/login', '/sitemap.xml', '/robots.txt']:
        status, h, body = fetch(p)
        title = re.search(r'<title>([^<]*)', body)
        print('%-22s %s  %-22s %s' % (p, status, h.get('X-Robots-Tag', '—'), title.group(1)[:50] if title else ''))
    req = urllib.request.Request(URL + '/uslugi', headers={'User-Agent': UA})
    opener = urllib.request.build_opener(type('NoRedirect', (urllib.request.HTTPRedirectHandler,),
                                              {'redirect_request': lambda *a: None}))
    try:
        opener.open(req, timeout=30)
    except urllib.error.HTTPError as e:
        print('/uslugi → %s %s' % (e.code, e.headers.get('Location')))
    status, _, body = fetch('/lead', 'POST', b'{"website":"bot","elapsed":10}', {'Content-Type': 'application/json'})
    print('заявка-ловушка:', status, body[:60])


if __name__ == '__main__':
    cmd = sys.argv[1] if len(sys.argv) > 1 else ''
    {'bundle': bundle, 'probe': probe, 'upload': upload, 'index': index, 'check': check}.get(cmd, lambda: print(__doc__))()
