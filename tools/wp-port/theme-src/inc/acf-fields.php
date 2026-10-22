<?php
/* Поля Secure Custom Fields (совместимы с ACF Pro). Значения по умолчанию берутся из макета в шаблонах. */

add_action('acf/init', 's20_register_fields');

function s20_register_fields() {
    if (!function_exists('acf_add_local_field_group')) return;

    acf_add_local_field_group([
        'key'      => 'group_s20_seo',
        'title'    => 'SEO',
        'fields'   => [
            ['key' => 'field_s20_seo_title', 'name' => 'seo_title', 'label' => 'Заголовок для поисковиков (title)', 'type' => 'text',
             'instructions' => 'Пусто — используется заголовок из макета.'],
            ['key' => 'field_s20_seo_description', 'name' => 'seo_description', 'label' => 'Описание (meta description)', 'type' => 'textarea', 'rows' => 3,
             'instructions' => 'Пусто — используется описание из макета.'],
        ],
        'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'page']]],
        'position' => 'side',
    ]);
}
