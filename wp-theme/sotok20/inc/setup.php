<?php
/* Подключение стилей и скриптов, чистка <head> до состава макета, отключение лишнего. */

add_action('after_setup_theme', function () {
    // <title> выводит s20_seo_head(), поэтому title-tag не подключаем
    add_theme_support('html5', ['script', 'style']);
});

// в макете этого нет — убираем из <head>
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rel_canonical');            // canonical выводит s20_seo_head()
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_print_auto_sizes_contain_css_fix', 1);
add_filter('emoji_svg_url', '__return_false');
// глобальные стили theme.json и классические стили блоков: в макете их нет
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
remove_action('wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles');
remove_action('wp_head', 'wp_print_font_faces', 50);
remove_action('wp_head', 'wp_print_font_faces_from_style_variations', 50);

add_action('wp_enqueue_scripts', function () {
    // блоковые стили WordPress в макете не используются и меняют вид страниц
    foreach (['wp-block-library', 'wp-block-library-theme', 'global-styles', 'classic-theme-styles', 'core-block-supports'] as $h) {
        wp_dequeue_style($h);
        wp_deregister_style($h);
    }
    wp_enqueue_style('s20-main', S20_A . 'css/main.css', [], S20_VER);
    // Tailwind — после main.css: Play CDN макета тоже дописывает свой <style> в самый конец <head>
    wp_enqueue_style('s20-tailwind', S20_A . 'css/tailwind.css', ['s20-main'], S20_VER);

    wp_enqueue_script('gsap', S20_A . 'js/vendor/gsap.min.js', [], '3.12.5', true);
    wp_enqueue_script('gsap-scrolltrigger', S20_A . 'js/vendor/ScrollTrigger.min.js', ['gsap'], '3.12.5', true);
    wp_enqueue_script('s20-main', S20_A . 'js/main.js', ['gsap', 'gsap-scrolltrigger'], S20_VER, true);
    wp_enqueue_script('s20-quiz', S20_A . 'js/quiz.js', ['s20-main'], S20_VER, true);
    // адрес политики (cookie, согласие в квизе) и адрес приёма заявок квиза
    wp_add_inline_script('s20-main', 'window.S20=' . wp_json_encode(['privacy' => home_url('/politika/'), 'lead' => rest_url('s20/v1/lead'), 'phone' => s20_c('phone'), 'tel' => s20_c('tel')]) . ';', 'before');
}, 100);
add_action('wp_footer', function () { wp_dequeue_style('core-block-supports'); }, 1);

// сайт — набор страниц: комментарии, XML-RPC, ленты и вложения не нужны
add_filter('xmlrpc_enabled', '__return_false');
add_filter('comments_open', '__return_false', 20);
add_filter('pings_open', '__return_false', 20);
// приоритет 1 — раньше redirect_canonical: иначе ?author=1 успевает перенаправить на /author/<логин>/
add_action('template_redirect', function () {
    if (is_feed() || is_author() || is_attachment() || is_search() || (is_archive() && !is_post_type_archive())) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
        nocache_headers();
    }
}, 1);
// список пользователей в REST раскрывает логин администратора — посетителям он не нужен
add_filter('rest_endpoints', function ($endpoints) {
    if (is_user_logged_in()) return $endpoints;
    foreach (array_keys($endpoints) as $route) {
        if (strpos($route, '/wp/v2/users') === 0) unset($endpoints[$route]);
    }
    return $endpoints;
});
// страницы собраны шаблонами и полями: блочный редактор для них не нужен
add_action('init', function () { remove_post_type_support('page', 'editor'); remove_post_type_support('page', 'comments'); });
