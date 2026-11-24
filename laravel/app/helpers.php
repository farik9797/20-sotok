<?php

/* Хелперы шаблонов — те же имена и поведение, что у темы WordPress (wp-theme/sotok20/inc/helpers.php),
   только возвращают строку: Blade выводит её сам ({{ }} — с экранированием, {!! !!} — как есть). */

use App\Support\Site;

// адрес папки ассетов со слешем в конце
function s20_a(): string
{
    return rtrim(asset('assets'), '/').'/';
}

// адрес страницы сайта: '' — главная, 'uslugi/plitka' — подстраница (всегда со слешем, как в WordPress)
function s20_url(string $path = ''): string
{
    $path = trim($path, '/');

    return rtrim(url('/'), '/').'/'.($path === '' ? '' : $path.'/');
}

function s20_opt(string $key, string $default = ''): string
{
    return Site::value('opt_'.$key) ?? $default;
}

/* ---------- Контакты и реквизиты: «Настройки сайта» с запасными значениями из макета ---------- */
function s20_contacts(): array
{
    $o = fn (string $k) => s20_opt($k, Site::OPTIONS[$k][1]);
    $c = [
        'phone' => $o('phone'), 'telegram' => $o('telegram_url'), 'viber' => $o('viber_url'),
        'email' => $o('email'), 'instagram' => $o('instagram_url'), 'hours' => $o('hours'),
        'company' => $o('company'), 'unp' => $o('unp'), 'office' => $o('office'),
    ];
    $c['tel'] = 'tel:'.preg_replace('/[^\d+]/', '', $c['phone']);

    return $c;
}

function s20_c(string $key): string
{
    return s20_contacts()[$key] ?? '';
}

// заполнители в текстах: {url:uslugi}, {asset}, {phone}, {email}…
function s20_expand(string $html): string
{
    $html = preg_replace_callback('/\{url:([a-z0-9\/-]*)\}/', fn ($m) => e(s20_url($m[1])), $html);
    $html = str_replace('{asset}', s20_a(), $html);

    return preg_replace_callback('/\{(tel|phone|telegram|viber|email|instagram|hours|company|unp|office)\}/',
        fn ($m) => e(s20_c($m[1])), $html);
}

// текстовое поле: значение из админки или текст макета
function s20_t(string $key): string
{
    $def = Site::fieldDef($key);
    $default = $def['default'] ?? '';
    $val = Site::value($key);
    if ($val === null || $val === $default) {
        return s20_expand($default);           // текст макета — доверенный
    }

    return Site::kses(s20_expand($val));
}

// картинка: загруженная в админке или картинка макета
function s20_img(string $key, string $what): string
{
    $def = Site::fieldDef($key);
    $img = Site::value($key);
    if ($what === 'src') {
        return $img !== null ? asset('uploads/'.$img) : s20_a().($def['default'] ?? '');
    }

    return Site::value($key.'__alt') ?? ($def['alt'] ?? '');
}

// пункт меню текущего раздела
function s20_nav(string $key): string
{
    return Site::navKey() === $key ? ' class="is-active"' : '';
}

function s20_nav_m(string $key): string
{
    return Site::navKey() === $key ? ' is-active' : '';
}

/* ---------- <title>, description, Open Graph и canonical — как в макете; переопределяются полями «SEO» ---------- */
function s20_seo_head(): string
{
    $path = Site::$path;
    $page = Site::pageKey();
    $d = $path !== null ? (Site::seoDefaults()[$path] ?? null) : null;
    if (! $d) {
        // страницы вне макета (404)
        $d = ['title' => 'Страница не найдена — 20 соток', 'description' => '', 'og_title' => '', 'og_description' => '', 'og_image' => 'img/og.jpg'];
    }
    $ownTitle = $page ? (Site::value($page.'__seo_title') ?? '') : '';
    $ownDesc = $page ? (Site::value($page.'__seo_description') ?? '') : '';
    $title = $ownTitle !== '' ? $ownTitle : $d['title'];
    $desc = $ownDesc !== '' ? $ownDesc : $d['description'];
    $ogTitle = $ownTitle !== '' ? $ownTitle : ($d['og_title'] !== '' ? $d['og_title'] : $title);
    $ogDesc = $ownDesc !== '' ? $ownDesc : ($d['og_description'] !== '' ? $d['og_description'] : $desc);
    $url = $path !== null ? s20_url($path) : '';

    $h = '<title>'.e($title)."</title>\n";
    if ($desc !== '') {
        $h .= '<meta name="description" content="'.e($desc)."\">\n";
    }
    $h .= "<meta property=\"og:type\" content=\"website\">\n";
    $h .= "<meta property=\"og:site_name\" content=\"20 соток\">\n";
    $h .= "<meta property=\"og:locale\" content=\"ru_RU\">\n";
    $h .= '<meta property="og:title" content="'.e($ogTitle)."\">\n";
    if ($ogDesc !== '') {
        $h .= '<meta property="og:description" content="'.e($ogDesc)."\">\n";
    }
    if ($url) {
        $h .= '<meta property="og:url" content="'.e($url)."\">\n";
    }
    $h .= '<meta property="og:image" content="'.e(s20_a().$d['og_image'])."\">\n";
    $h .= "<meta property=\"og:image:width\" content=\"1200\">\n";
    $h .= "<meta property=\"og:image:height\" content=\"630\">\n";
    $h .= "<meta name=\"twitter:card\" content=\"summary_large_image\">\n";
    if ($url) {
        $h .= '<link rel="canonical" href="'.e($url)."\">\n";
    }

    return rtrim($h, "\n");
}
