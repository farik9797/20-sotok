<?php
/* Поля Secure Custom Fields (совместимы с ACF Pro).
   Значения по умолчанию — тексты и картинки макета: пока поле не тронуто, сайт выглядит как макет 1:1. */

add_action('acf/init', 's20_register_fields');

function s20_register_fields() {
    if (!function_exists('acf_add_local_field_group')) return;

    // --- Настройки сайта: контакты и реквизиты, которые повторяются на всех страницах ---
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Настройки сайта',
            'menu_title' => 'Настройки сайта',
            'menu_slug'  => 's20-settings',
            'capability' => 'manage_options',
            'icon_url'   => 'dashicons-admin-settings',
            'position'   => 59,
        ]);
    }
    $opt = function ($name, $label, $default, $type = 'text', $instructions = '') {
        return ['key' => 'field_s20_opt_' . $name, 'name' => $name, 'label' => $label, 'type' => $type,
                'default_value' => $default, 'instructions' => $instructions];
    };
    acf_add_local_field_group([
        'key'    => 'group_s20_settings',
        'title'  => 'Настройки сайта',
        'fields' => [
            ['key' => 'field_s20_opt_tab_contacts', 'name' => '', 'label' => 'Контакты и реквизиты', 'type' => 'tab'],
            $opt('phone', 'Телефон', '+375 (44) 517-30-50', 'text', 'Так, как он выводится на сайте; ссылка tel: собирается из цифр автоматически.'),
            $opt('telegram_url', 'Telegram — ссылка', 'https://t.me/+375445173050'),
            $opt('viber_url', 'Viber — ссылка', 'viber://chat?number=%2B375445173050'),
            $opt('email', 'E-mail', 'by20sotok@gmail.com', 'email'),
            $opt('instagram_url', 'Instagram — ссылка', 'https://www.instagram.com/20sotok.by/', 'url'),
            $opt('hours', 'Время работы', 'Ежедневно 9:00–20:00'),
            $opt('company', 'Исполнитель (ИП / организация)', 'ИП Денисов Евгений Игоревич'),
            $opt('unp', 'УНП', '193435021'),
            $opt('office', 'Адрес офиса', 'г. Минск, ул. Козыревская, 15, офис 604'),
            ['key' => 'field_s20_opt_tab_leads', 'name' => '', 'label' => 'Заявки', 'type' => 'tab'],
            $opt('leads_email', 'Куда присылать заявки (e-mail)', 'by20sotok@gmail.com', 'email', 'На этот ящик приходит каждая заявка из калькулятора бюджета.'),
            $opt('mail_from', 'Адрес отправителя писем', 'postmaster@20sotok.by', 'email', 'Должен быть на домене сайта, иначе письма уйдут в спам.'),
            $opt('tg_bot_token', 'Telegram: токен бота', '', 'text', 'Необязательно. Если заполнить вместе с ID чата — заявки будут дублироваться в Telegram.'),
            $opt('tg_chat_id', 'Telegram: ID чата', '', 'text'),
        ],
        'location' => [[['param' => 'options_page', 'operator' => '==', 'value' => 's20-settings']]],
    ]);

    // --- SEO каждой страницы ---
    acf_add_local_field_group([
        'key'      => 'group_s20_seo',
        'title'    => 'SEO',
        'fields'   => [
            ['key' => 'field_s20_seo_title', 'name' => 'seo_title', 'label' => 'Заголовок для поисковиков (title)', 'type' => 'text',
             'instructions' => 'Пусто — заголовок из макета.'],
            ['key' => 'field_s20_seo_description', 'name' => 'seo_description', 'label' => 'Описание (meta description)', 'type' => 'textarea', 'rows' => 3,
             'instructions' => 'Пусто — описание из макета.'],
        ],
        'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'page']]],
        'position' => 'side',
    ]);

    // --- Контент страниц: по группе на шаблон, вкладка на секцию ---
    foreach (glob(__DIR__ . '/fields/*.php') as $file) {
        $group = require $file;
        $page = basename($file, '.php');
        $out = [];
        $tab = null;
        foreach ($group['fields'] as $f) {
            if ($f['tab_no'] !== $tab) {
                $tab = $f['tab_no'];
                $out[] = ['key' => 'field_' . $page . '_tab' . $tab, 'name' => '', 'type' => 'tab', 'placement' => 'left',
                          'label' => sprintf('%02d · %s', $tab === 99 ? 0 : $tab, $f['tab'] !== '' ? $f['tab'] : 'Секция')];
            }
            if ($f['type'] === 'image') {
                $out[] = ['key' => 'field_' . $f['key'], 'name' => $f['key'], 'label' => $f['label'], 'type' => 'image',
                          'return_format' => 'array', 'preview_size' => 'medium', 'library' => 'all',
                          'instructions' => 'Пусто — картинка макета (' . $f['default'] . ').'];
                continue;
            }
            $long = mb_strlen($f['default']) > 90 || strpos($f['default'], '<') !== false;
            $out[] = ['key' => 'field_' . $f['key'], 'name' => $f['key'], 'label' => $f['label'],
                      'type' => $long ? 'textarea' : 'text', 'rows' => $long ? 3 : null, 'new_lines' => '',
                      'default_value' => $f['default']];
        }
        acf_add_local_field_group([
            'key'      => 'group_s20_page_' . $page,
            'title'    => 'Контент страницы — ' . $group['title'],
            'fields'   => $out,
            'location' => [[$group['location']]],
            'style'    => 'seamless',
            'instruction_placement' => 'field',
        ]);
    }
}
