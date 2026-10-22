<?php
/* Одноразовая первичная настройка сайта «20 соток». deploy.py заливает этот файл под случайным именем,
   вызывает его один раз с ключом и сразу удаляет. Кроме ключа, входных данных не принимает. */
if (!hash_equals('%TOKEN%', (string) (isset($_GET['k']) ? $_GET['k'] : ''))) { http_response_code(404); exit; }
header('Content-Type: text/plain; charset=utf-8');
@set_time_limit(300);

define('WP_INSTALLING', true);
require __DIR__ . '/wp-load.php';
require_once ABSPATH . 'wp-admin/includes/upgrade.php';
require_once ABSPATH . 'wp-admin/includes/plugin.php';
require_once ABSPATH . 'wp-admin/includes/theme.php';

$cfg = json_decode(base64_decode('%CFG%'), true);
$log = function ($s) { echo $s, "\n"; };

// 1. установка ядра
if (!is_blog_installed()) {
    $r = wp_install($cfg['title'], $cfg['admin_user'], $cfg['admin_email'], (int) $cfg['public'], '', wp_slash($cfg['admin_pass']), 'ru_RU');
    $log('WordPress установлен, администратор #' . $r['user_id']);
} else {
    $log('WordPress уже установлен — шаг пропущен');
}

// 2. основные настройки
update_option('blogdescription', 'Инженерное благоустройство участка в Минске');
update_option('blog_public', (int) $cfg['public']);
update_option('WPLANG', 'ru_RU');
update_option('timezone_string', 'Europe/Minsk');
update_option('date_format', 'd.m.Y');
update_option('time_format', 'H:i');
update_option('start_of_week', 1);
update_option('default_comment_status', 'closed');
update_option('default_ping_status', 'closed');
update_option('permalink_structure', '/%postname%/');
$log('настройки: язык, часовой пояс, ЧПУ, комментарии выключены, индексация ' . ($cfg['public'] ? 'включена' : 'закрыта'));

// 3. тема и плагин полей
switch_theme('sotok20');
$res = activate_plugin('secure-custom-fields/secure-custom-fields.php');
$log('тема: ' . get_stylesheet() . '; Secure Custom Fields: ' . (is_wp_error($res) ? 'ошибка ' . $res->get_error_message() : 'включён'));

// 4. стартовый контент WordPress не нужен
foreach (get_posts(['post_type' => ['post', 'page'], 'post_status' => 'any', 'numberposts' => -1]) as $p) {
    if (!get_post_meta($p->ID, '_s20_page', true)) wp_delete_post($p->ID, true);
}

// 5. страницы сайта с адресами и шаблонами макета (повторный запуск ничего не дублирует)
$ids = [];
foreach ($cfg['pages'] as $pg) {
    list($title, $slug, $parent, $tpl) = $pg;
    $parent_id = $parent ? $ids[$parent] : 0;
    $existing = get_posts(['post_type' => 'page', 'name' => $slug, 'post_parent' => $parent_id, 'post_status' => 'any', 'numberposts' => 1]);
    if ($existing) {
        $id = $existing[0]->ID;
    } else {
        $id = wp_insert_post(['post_type' => 'page', 'post_status' => 'publish', 'post_title' => $title,
                              'post_name' => $slug, 'post_parent' => $parent_id, 'comment_status' => 'closed'], true);
        if (is_wp_error($id)) { $log('ОШИБКА страницы ' . $slug . ': ' . $id->get_error_message()); continue; }
    }
    update_post_meta($id, '_s20_page', 1);
    if ($tpl) update_post_meta($id, '_wp_page_template', $tpl);
    $ids[$slug] = $id;
}
update_option('show_on_front', 'page');
update_option('page_on_front', $ids['glavnaya']);
update_option('page_for_posts', 0);
$log('страниц: ' . count($ids) . '; главная — #' . $ids['glavnaya']);

flush_rewrite_rules(false);
$log('ГОТОВО');

// установочный скрипт стирает сам себя (deploy.py дополнительно удаляет его по FTP)
@unlink(__FILE__);
