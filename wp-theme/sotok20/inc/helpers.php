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
