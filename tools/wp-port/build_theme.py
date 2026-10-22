#!/usr/bin/env python3
"""Сборка WordPress-темы «sotok20» из статического макета.

Макет (index.html, uslugi/*.html и т. д.) — единственный источник разметки.
Шаблоны темы генерируются из него, поэтому вывод WordPress совпадает с макетом:
меняются только адреса (ассеты темы, постоянные ссылки WP) и активный пункт меню.

Запуск:  python3 tools/wp-port/build_theme.py
Результат: wp-theme/sotok20/
"""
import html
import json
import pathlib
import re
import shutil
import subprocess
import sys

ROOT = pathlib.Path(__file__).resolve().parents[2]
TOOLS = pathlib.Path(__file__).resolve().parent
OUT = ROOT / 'wp-theme' / 'sotok20'
THEME_VERSION = '1.0.0'

# статический файл → путь страницы в WP, шаблон, пункт меню, сюжет квиза
PAGES = [
    ('index.html',          '',               'front-page.php',      'home'),
    ('o-kompanii.html',     'o-kompanii',     'page-o-kompanii.php', 'o-kompanii'),
    ('uslugi.html',         'uslugi',         'page-uslugi.php',     'uslugi'),
    ('uslugi/plitka.html',  'uslugi/plitka',  'page-plitka.php',     'uslugi'),
    ('uslugi/gazon.html',   'uslugi/gazon',   'page-gazon.php',      'uslugi'),
    ('uslugi/poliv.html',   'uslugi/poliv',   'page-poliv.php',      'uslugi'),
    ('uslugi/drenazh.html', 'uslugi/drenazh', 'page-drenazh.php',    'uslugi'),
    ('proekty.html',        'proekty',        'page-proekty.php',    'proekty'),
    ('blog.html',           'blog',           'page-blog.php',       'blog'),
    ('kontakty.html',       'kontakty',       'page-kontakty.php',   'kontakty'),
    ('politika.html',       'politika',       'page-politika.php',   ''),
]
NAV_KEYS = {'index': 'home', 'o-kompanii': 'o-kompanii', 'uslugi': 'uslugi',
            'proekty': 'proekty', 'blog': 'blog', 'kontakty': 'kontakty'}


def read(rel):
    return (ROOT / rel).read_text(encoding='utf-8')


def write(rel, text):
    path = OUT / rel
    path.parent.mkdir(parents=True, exist_ok=True)
    path.write_text(text, encoding='utf-8')


def block_end(s, start, tag='div'):
    """Индекс сразу после парного закрывающего тега для блока, начинающегося в start."""
    depth = 0
    for m in re.finditer(r'<(/?)' + tag + r'\b[^>]*>', s[start:]):
        depth += -1 if m.group(1) else 1
        if depth == 0:
            return start + m.end()
    raise ValueError('не найден парный </%s>' % tag)


def rewrite_urls(s):
    """Относительные адреса макета → адреса WordPress."""
    s = re.sub(r'(?<=")(?:\.\./)*assets/', '<?php echo S20_A; ?>', s)

    def page(m):
        path, anchor = m.group(1), m.group(2) or ''
        path = '' if path == 'index' else path
        return '"<?php echo s20_url(\'%s\'); ?>%s"' % (path, anchor)
    s = re.sub(r'"(?:\.\./)*([a-z0-9-]+(?:/[a-z0-9-]+)?)\.html(#[^"]*)?"', page, s)
    if re.search(r'"(?:\.\./)*[a-z0-9/-]+\.html', s):
        raise ValueError('остались ссылки на .html')
    return s


def nav_php(chrome):
    """Активный пункт меню: класс is-active выставляет PHP по текущей странице."""
    def desktop(m):
        key = NAV_KEYS[m.group(1)]
        return '<a href="%s.html"<?php s20_nav(\'%s\'); ?>>' % (m.group(1), key)
    chrome = re.sub(r'<a href="([a-z-]+)\.html"(?: class="is-active")?>(?=[^<]+</a>)', desktop, chrome)

    def mobile(m):
        key = NAV_KEYS[m.group(1)]
        return '<a href="%s.html" class="big<?php s20_nav_m(\'%s\'); ?>">' % (m.group(1), key)
    chrome = re.sub(r'<a href="([a-z-]+)\.html" class="big(?: is-active)?">', mobile, chrome)
    return chrome


def split_page(src):
    s = read(src)
    head = s[:s.index('</head>')]
    body_start = s.index('<body')
    sprite_start = s.index('<svg xmlns="http://www.w3.org/2000/svg" style="display:none"', body_start)
    sprite_end = s.index('</svg>', sprite_start) + len('</svg>')
    header_start = s.index('<header class="nav">', sprite_end)
    menu_start = s.index('<div class="mobile-menu"', header_start)
    menu_end = block_end(s, menu_start)
    footer_start = s.index('<footer class="footer"', menu_end)
    footer_end = s.index('</footer>', footer_start) + len('</footer>')
    scripts_start = s.index('<script src="https://cdnjs', footer_end)
    return {
        'head': head,
        'sprite': s[sprite_start:sprite_end],
        'chrome': s[header_start:menu_end],
        'body': s[menu_end:footer_start],
        'footer': s[footer_start:footer_end],
        'tail': s[footer_end:scripts_start],
    }


def seo_from_head(head):
    def meta(attr, name):
        m = re.search(r'<meta %s="%s" content="([^"]*)"' % (attr, re.escape(name)), head)
        return html.unescape(m.group(1)) if m else ''
    title = re.search(r'<title>(.*?)</title>', head, re.S).group(1)
    return {
        'title': html.unescape(title),
        'description': meta('name', 'description'),
        'og_title': meta('property', 'og:title'),
        'og_description': meta('property', 'og:description'),
        'og_image': re.sub(r'^.*?/assets/', '', meta('property', 'og:image')),
    }


def php_array(value, indent=1):
    """Простой экспорт словаря/строк в синтаксис PHP-массива."""
    pad = '    ' * indent
    if isinstance(value, dict):
        items = ',\n'.join('%s%s => %s' % (pad, php_array(k), php_array(v, indent + 1)) for k, v in value.items())
        return '[\n%s,\n%s]' % (items, '    ' * (indent - 1))
    return "'" + str(value).replace('\\', '\\\\').replace("'", "\\'") + "'"


def build():
    if OUT.exists():
        for child in OUT.iterdir():
            if child.name in ('assets',):
                continue
            shutil.rmtree(child) if child.is_dir() else child.unlink()
    OUT.mkdir(parents=True, exist_ok=True)

    parts = {src: split_page(src) for src, *_ in PAGES}
    base = parts['index.html']

    # общие части должны совпадать на всех страницах (с точностью до путей и активного пункта)
    norm = lambda x: re.sub(r'(\.\./)+', '', x)
    for src, p in parts.items():
        assert norm(p['footer']) == norm(base['footer']), 'подвал отличается: ' + src
        assert p['sprite'] == base['sprite'], 'спрайт отличается: ' + src
        assert nav_php(norm(p['chrome'])) == nav_php(norm(base['chrome'])), 'шапка отличается: ' + src

    # --- header.php ---
    head = base['head']
    fonts = re.search(r'<link rel="preconnect" href="https://fonts.googleapis.com">.*?<link rel="stylesheet" href="https://fonts.googleapis.com[^>]*>', head, re.S).group(0)
    theme_script = re.search(r'<script>try\{if\(localStorage.*?</script>', head).group(0)
    theme_color = re.search(r'<meta name="theme-color"[^>]*>', head).group(0)
    header_php = (
        '<?php\n/* Шапка: собирается из макета скриптом tools/wp-port/build_theme.py — правки вносить в макет. */\n?>'
        '<!DOCTYPE html>\n<html lang="ru">\n<head>\n<meta charset="utf-8">\n'
        '<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">\n'
        '<?php s20_seo_head(); ?>\n'
        + theme_color + '\n'
        '<link rel="icon" type="image/svg+xml" href="<?php echo S20_A; ?>logo/logo-mark.svg">\n'
        + fonts + '\n'
        '<?php wp_head(); ?>\n'
        + theme_script + '\n'
        '</head>\n<body class="grain">\n<?php wp_body_open(); ?>\n'
        + base['sprite'] + '\n\n'
        + rewrite_urls(nav_php(base['chrome'])) + '\n'
    )
    write('header.php', header_php)

    # --- footer.php ---
    tail = re.sub(r'data-preselect="[^"]*"', 'data-preselect="<?php echo esc_attr(s20_preselect()); ?>"', base['tail'])
    footer_php = (
        '<?php\n/* Подвал: собирается из макета скриптом tools/wp-port/build_theme.py — правки вносить в макет. */\n?>'
        + rewrite_urls(base['footer']) + tail + '<?php wp_footer(); ?>\n</body>\n</html>\n'
    )
    write('footer.php', footer_php)

    # --- шаблоны страниц ---
    seo = {}
    for src, path, template, _nav in PAGES:
        p = parts[src]
        pre = re.search(r'data-preselect="([^"]*)"', p['tail']).group(1)
        body = rewrite_urls(p['body'])
        tpl = ('<?php\n/* %s — собрано из макета %s скриптом tools/wp-port/build_theme.py. */\n'
               "get_header();\n?>" % (template, src)
               + body
               + ("<?php s20_set_preselect('%s'); get_footer();\n" % pre))
        write(template, tpl)
        seo[path] = seo_from_head(p['head'])

    write('inc/seo-defaults.php',
          '<?php\n/* SEO по умолчанию — снято с макета. Переопределяется полями страницы «SEO». */\n'
          'return ' + php_array(seo) + ';\n')

    # --- статические файлы темы (функции, стили, ассеты) ---
    for f in (TOOLS / 'theme-src').rglob('*'):
        if f.is_file():
            rel = f.relative_to(TOOLS / 'theme-src')
            (OUT / rel).parent.mkdir(parents=True, exist_ok=True)
            shutil.copy2(f, OUT / rel)
    style = (OUT / 'style.css').read_text(encoding='utf-8').replace('{{VERSION}}', THEME_VERSION)
    (OUT / 'style.css').write_text(style, encoding='utf-8')

    assets = OUT / 'assets'
    for sub in ('img', 'video', 'logo'):
        if (assets / sub).exists():
            shutil.rmtree(assets / sub)
        shutil.copytree(ROOT / 'assets' / sub, assets / sub, ignore=shutil.ignore_patterns('.DS_Store'))
    (assets / 'css').mkdir(parents=True, exist_ok=True)
    (assets / 'js').mkdir(parents=True, exist_ok=True)
    shutil.copy2(ROOT / 'assets/css/main.css', assets / 'css/main.css')
    shutil.copy2(ROOT / 'assets/js/main.js', assets / 'js/main.js')
    shutil.copy2(ROOT / 'assets/js/quiz.js', assets / 'js/quiz.js')

    # Tailwind: та же версия, что у Play CDN макета, тот же конфиг
    tw = subprocess.run(['npx', '-y', 'tailwindcss@3.4.17', '-c', str(TOOLS / 'tailwind.config.js'),
                         '-i', str(TOOLS / 'tailwind.input.css'), '-o', str(assets / 'css/tailwind.css'), '--minify'],
                        cwd=ROOT, capture_output=True, text=True)
    if tw.returncode != 0:
        sys.exit('Tailwind: ' + tw.stderr[-800:])

    print('тема собрана:', OUT.relative_to(ROOT))
    print('шаблонов страниц:', len(PAGES))


if __name__ == '__main__':
    build()
