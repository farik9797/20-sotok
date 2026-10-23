<?php
/*
Plugin Name: 20 соток — первичная настройка
Description: Срабатывает один раз сразу после установки WordPress: тема, плагин полей, страницы с шаблонами, главная, ЧПУ. Затем удаляет себя.
*/
if (!defined('ABSPATH')) exit;

add_action('init', function () {
    if (wp_installing() || !is_blog_installed() || get_option('s20_setup_done')) return;
    update_option('s20_setup_done', time());           // сразу, чтобы параллельный запрос не запустил настройку второй раз

    require_once ABSPATH . 'wp-admin/includes/plugin.php';
    require_once ABSPATH . 'wp-admin/includes/theme.php';
    $pages = json_decode(base64_decode('%PAGES%'), true);
    $log = [];

    update_option('blogdescription', 'Инженерное благоустройство участка в Минске');
    update_option('timezone_string', 'Europe/Minsk');
    update_option('date_format', 'd.m.Y');
    update_option('time_format', 'H:i');
    update_option('start_of_week', 1);
    update_option('default_comment_status', 'closed');
    update_option('default_ping_status', 'closed');
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');   // и опция, и объект правил — иначе правила соберутся по старой схеме
    if (wp_get_environment_type() !== 'production') update_option('blog_public', 0);   // тестовая копия не индексируется

    switch_theme('sotok20');
    $res = activate_plugin('secure-custom-fields/secure-custom-fields.php');
    $log[] = 'SCF: ' . (is_wp_error($res) ? $res->get_error_message() : 'включён');

    // стартовый контент WordPress не нужен
    foreach (get_posts(['post_type' => ['post', 'page'], 'post_status' => 'any', 'numberposts' => -1]) as $p) {
        if (!get_post_meta($p->ID, '_s20_page', true)) wp_delete_post($p->ID, true);
    }
    $ids = [];
    foreach ($pages as $pg) {
        list($title, $slug, $parent, $tpl) = $pg;
        $parent_id = $parent ? $ids[$parent] : 0;
        $id = wp_insert_post(['post_type' => 'page', 'post_status' => 'publish', 'post_title' => $title,
                              'post_name' => $slug, 'post_parent' => $parent_id, 'comment_status' => 'closed'], true);
        if (is_wp_error($id)) { $log[] = 'ошибка страницы ' . $slug; continue; }
        update_post_meta($id, '_s20_page', 1);
        if ($tpl) update_post_meta($id, '_wp_page_template', $tpl);
        $ids[$slug] = $id;
    }
    update_option('show_on_front', 'page');
    update_option('page_on_front', $ids['glavnaya']);
    update_option('page_for_posts', 0);
    delete_option('rewrite_rules');                     // правила пересоберутся на следующем запросе с новой схемой
    $log[] = 'страниц: ' . count($ids);
    update_option('s20_setup_log', implode('; ', $log));

    @unlink(__FILE__);                                    // одноразовый: после настройки больше не нужен

    // тема сменилась посреди запроса: её functions.php в нём не загружен, и шаблоны упадут —
    // страницу строим заново отдельным запросом (wp_safe_redirect пустит только на свой домен)
    if (isset($_SERVER['REQUEST_METHOD'], $_SERVER['HTTP_HOST'], $_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_METHOD'] === 'GET'
        && !wp_doing_ajax() && !wp_doing_cron() && !is_admin()) {
        nocache_headers();
        wp_safe_redirect((is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit;
    }
}, 1);
