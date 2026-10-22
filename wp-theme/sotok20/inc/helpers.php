<?php
/* Вспомогательные функции темы. */

// адрес страницы сайта по её пути: '' — главная, 'uslugi/plitka' — подстраница
function s20_url($path = '') {
    $path = trim($path, '/');
    return esc_url(home_url($path === '' ? '/' : '/' . $path . '/'));
}

// путь текущей страницы в том же виде: '', 'uslugi', 'uslugi/plitka'; null — не страница
function s20_current_path() {
    if (is_front_page()) return '';
    if (!is_page()) return null;
    return get_page_uri(get_queried_object_id());
}

// раздел главного меню, к которому относится текущая страница
function s20_nav_key() {
    $path = s20_current_path();
    if ($path === '') return 'home';
    if ($path === null) return '';
    $first = explode('/', $path)[0];
    return in_array($first, ['o-kompanii', 'uslugi', 'proekty', 'blog', 'kontakty'], true) ? $first : '';
}
function s20_nav($key)   { if (s20_nav_key() === $key) echo ' class="is-active"'; }
function s20_nav_m($key) { if (s20_nav_key() === $key) echo ' is-active'; }

// сюжет квиза (data-preselect модалки): шаблон задаёт его перед get_footer()
function s20_set_preselect($value) { $GLOBALS['s20_preselect'] = (string) $value; }
function s20_preselect() { return isset($GLOBALS['s20_preselect']) ? $GLOBALS['s20_preselect'] : ''; }

// значение поля SCF/ACF; пока поле пустое — значение из макета
function s20_field($key, $default = '', $post_id = null) {
    if (function_exists('get_field')) {
        $val = get_field($key, $post_id);
        if ($val !== null && $val !== '' && $val !== false) return $val;
    }
    return $default;
}
function s20_opt($key, $default = '') { return s20_field($key, $default, 'option'); }

/* ---------- Контакты и реквизиты: «Настройки сайта» с запасными значениями из макета ---------- */
function s20_contacts() {
    static $c = null;
    if ($c === null) {
        $c = [
            'phone'     => s20_opt('phone', '+375 (44) 517-30-50'),
            'telegram'  => s20_opt('telegram_url', 'https://t.me/+375445173050'),
            'viber'     => s20_opt('viber_url', 'viber://chat?number=%2B375445173050'),
            'email'     => s20_opt('email', 'by20sotok@gmail.com'),
            'instagram' => s20_opt('instagram_url', 'https://www.instagram.com/20sotok.by/'),
            'hours'     => s20_opt('hours', 'Ежедневно 9:00–20:00'),
            'company'   => s20_opt('company', 'ИП Денисов Евгений Игоревич'),
            'unp'       => s20_opt('unp', '193435021'),
            'office'    => s20_opt('office', 'г. Минск, ул. Козыревская, 15, офис 604'),
        ];
        $c['tel'] = 'tel:' . preg_replace('/[^\d+]/', '', $c['phone']);
    }
    return $c;
}
function s20_c($key) { $c = s20_contacts(); return isset($c[$key]) ? $c[$key] : ''; }

/* ---------- Тексты и картинки страниц ---------- */

// поля страницы со значениями из макета: inc/fields/<страница>.php
function s20_page_fields($page) {
    static $cache = [];
    if (!isset($cache[$page])) {
        $file = __DIR__ . '/fields/' . basename($page) . '.php';
        $group = is_file($file) ? require $file : ['fields' => []];
        $map = [];
        foreach ($group['fields'] as $f) $map[$f['key']] = $f;
        $cache[$page] = $map;
    }
    return $cache[$page];
}
function s20_field_def($key) {
    $page = preg_replace('/_(s\d\d|x)_\d\d$/', '', $key);
    $map = s20_page_fields($page);
    return isset($map[$key]) ? $map[$key] : null;
}

// заполнители в текстах: {url:uslugi}, {asset}, {phone}, {email}…
function s20_expand($html) {
    $html = preg_replace_callback('/\{url:([a-z0-9\/-]*)\}/', function ($m) { return s20_url($m[1]); }, $html);
    $html = str_replace('{asset}', S20_A, $html);
    return preg_replace_callback('/\{(tel|phone|telegram|viber|email|instagram|hours|company|unp|office)\}/', function ($m) {
        return esc_html(s20_c($m[1]));
    }, $html);
}

// разметка, которую можно вводить в текстовых полях (то же, что встречается в макете)
function s20_allowed_html() {
    $common = ['class' => true, 'style' => true, 'aria-hidden' => true, 'aria-label' => true];
    return [
        'a' => $common + ['href' => true, 'target' => true, 'rel' => true],
        'b' => $common, 'strong' => $common, 'em' => $common, 'i' => $common, 'span' => $common,
        'small' => $common, 'sup' => $common, 'sub' => $common, 'mark' => $common, 'br' => $common,
        'svg' => $common + ['viewbox' => true], 'use' => ['href' => true],
    ];
}

// вывод текстового поля: значение редактора или текст макета
function s20_t($key) {
    $def = s20_field_def($key);
    $default = $def ? $def['default'] : '';
    $val = function_exists('get_field') ? get_field($key) : null;
    if ($val === null || $val === '' || $val === false || $val === $default) {
        echo s20_expand($default);          // текст макета — доверенный
        return;
    }
    echo wp_kses(s20_expand((string) $val), s20_allowed_html());
}

// вывод картинки: загруженная редактором или картинка макета
function s20_img($key, $what) {
    $def = s20_field_def($key);
    $img = function_exists('get_field') ? get_field($key) : null;
    if (is_array($img) && !empty($img['url'])) {
        if ($what === 'src') { echo esc_url($img['url']); return; }
        echo esc_attr($img['alt'] !== '' ? $img['alt'] : ($def ? $def['alt'] : ''));
        return;
    }
    if ($what === 'src') { echo esc_url(S20_A . ($def ? $def['default'] : '')); return; }
    echo esc_attr($def ? $def['alt'] : '');
}
