#!/usr/bin/env python3
"""Laravel-копия сайта 1:1: Blade-шаблоны, поля и ассеты из собранной темы WordPress.

Макет остаётся единственным источником: tools/wp-port/build_theme.py собирает тему wp-theme/sotok20,
этот скрипт переводит её PHP-шаблоны в Blade (вызовы s20_* те же, только без echo) и копирует
описания полей, SEO по умолчанию и ассеты в laravel/.

  python3 tools/laravel-port/build_laravel.py
"""
import pathlib
import re
import shutil
import subprocess
import sys

PROJECT = pathlib.Path(__file__).resolve().parents[2]
THEME = PROJECT / 'wp-theme' / 'sotok20'
APP = PROJECT / 'laravel'
VIEWS = APP / 'resources' / 'views'
SITE = APP / 'resources' / 'site'

# шаблон темы → Blade-вид
TEMPLATES = {
    'front-page.php': 'pages/home', 'page-o-kompanii.php': 'pages/o-kompanii', 'page-uslugi.php': 'pages/uslugi',
    'page-plitka.php': 'pages/plitka', 'page-gazon.php': 'pages/gazon', 'page-poliv.php': 'pages/poliv',
    'page-drenazh.php': 'pages/drenazh', 'page-proekty.php': 'pages/proekty', 'page-blog.php': 'pages/blog',
    'page-kontakty.php': 'pages/kontakty', 'page-politika.php': 'pages/politika', '404.php': 'errors/404',
}

# вызовы темы → Blade; всё, что в шаблоне между <?php ?>, обязано попасть под одно из правил
CALLS = [
    (r"<\?php s20_t\('([a-z0-9_]+)'\); \?>", r"{!! s20_t('\1') !!}"),
    (r"<\?php s20_img\('([a-z0-9_]+)', '(src|alt)'\); \?>", r"{{ s20_img('\1', '\2') }}"),
    (r"<\?php echo s20_url\('([a-z0-9/-]*)'\); \?>", r"{{ s20_url('\1') }}"),
    (r"<\?php echo S20_A; \?>", r"{{ s20_a() }}"),
    (r"<\?php echo esc_html\(s20_c\('([a-z_]+)'\)\); \?>", r"{{ s20_c('\1') }}"),
    (r"<\?php s20_nav\('([a-z-]+)'\); \?>", r"{!! s20_nav('\1') !!}"),
    (r"<\?php s20_nav_m\('([a-z-]+)'\); \?>", r"{{ s20_nav_m('\1') }}"),
    (r"<\?php echo esc_attr\(s20_preselect\(\)\); \?>", r"{{ $preselect ?? '' }}"),
    (r"<\?php s20_seo_head\(\); \?>", r"{!! s20_seo_head() !!}"),
    (r"<\?php wp_head\(\); \?>", r"@include('site.head-assets')"),
    (r"<\?php wp_body_open\(\); \?>\n", r""),
    (r"<\?php wp_footer\(\); \?>", r"@include('site.footer-assets')"),
]


def blade_safe(html, name):
    """Литеральный текст шаблона не должен содержать конструкций Blade."""
    plain = re.sub(r'<\?php.*?\?>', '', html, flags=re.S)
    if '{{' in plain or '{!!' in plain:
        sys.exit('%s: в тексте есть «{{» — Blade примет его за вывод' % name)
    # Blade разбирает @слово после не-буквы; удваиваем @, чтобы оно осталось литералом
    return re.sub(r'(?<![A-Za-z0-9_@])@(?=[A-Za-z0-9_])', '@@', html)


def convert(html, name):
    for pat, rep in CALLS:
        html = re.sub(pat, rep, html)
    left = re.findall(r'<\?php.*?(?:\?>|$)', html, flags=re.S)
    if left:
        sys.exit('%s: не переведено: %s' % (name, left[0][:120]))
    return html


def page_view(name):
    src = blade_safe((THEME / name).read_text(encoding='utf-8'), name)
    src = re.sub(r'\A<\?php\n/\*.*?\*/\nget_header\(\);\n\?>\n', "@include('site.header')\n", src, flags=re.S)
    m = re.search(r"<\?php (?:s20_set_preselect\('([^']*)'\); )?get_footer\(\);\s*\Z", src)
    if not m or not src.startswith("@include('site.header')"):
        sys.exit('%s: неожиданное начало или конец шаблона' % name)
    src = src[:m.start()] + "@include('site.footer', ['preselect' => '%s'])\n" % (m.group(1) or '')
    return convert(src, name)


def chrome_view(name):
    src = blade_safe((THEME / name).read_text(encoding='utf-8'), name)
    src = re.sub(r'\A<\?php\n/\*.*?\*/\n\?>', '', src, flags=re.S)
    return convert(src, name)


def write(rel, text):
    p = APP / rel
    p.parent.mkdir(parents=True, exist_ok=True)
    p.write_text(text, encoding='utf-8')


def main():
    if '--no-theme' not in sys.argv:
        subprocess.run([sys.executable, str(PROJECT / 'tools' / 'wp-port' / 'build_theme.py')], check=True,
                       stdout=subprocess.DEVNULL)
    write('resources/views/site/header.blade.php', chrome_view('header.php'))
    write('resources/views/site/footer.blade.php', chrome_view('footer.php'))
    for tpl, view in TEMPLATES.items():
        write('resources/views/%s.blade.php' % view, page_view(tpl))

    # описания полей и SEO по умолчанию — те же PHP-массивы, что у темы
    if (SITE / 'fields').exists():
        shutil.rmtree(SITE / 'fields')
    shutil.copytree(THEME / 'inc' / 'fields', SITE / 'fields')
    shutil.copy2(THEME / 'inc' / 'seo-defaults.php', SITE / 'seo-defaults.php')
    # версия темы — в ?ver= у CSS и JS, как у WordPress
    ver = re.search(r'^Version:\s*(\S+)', (THEME / 'style.css').read_text(encoding='utf-8'), re.M).group(1)
    write('resources/site/version.php', "<?php\n/* Версия ассетов — из темы WordPress. */\nreturn '%s';\n" % ver)

    # ассеты: картинки, видео, собранный CSS, скрипты
    subprocess.run(['rsync', '-a', '--delete', str(THEME / 'assets') + '/', str(APP / 'public' / 'assets') + '/'],
                   check=True)
    n = sum(1 for _ in (SITE / 'fields').glob('*.php'))
    print('Laravel: шаблонов %d, файлов полей %d, ассеты скопированы' % (len(TEMPLATES) + 2, n))


if __name__ == '__main__':
    main()
