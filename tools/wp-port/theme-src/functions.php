<?php
/* Тема «20 соток» — WordPress-порт статического макета 1:1. */
define('S20_VER', wp_get_theme(get_template())->get('Version'));
define('S20_A', get_template_directory_uri() . '/assets/');

require_once __DIR__ . '/inc/helpers.php';
require_once __DIR__ . '/inc/seo.php';
require_once __DIR__ . '/inc/setup.php';
require_once __DIR__ . '/inc/acf-fields.php';
