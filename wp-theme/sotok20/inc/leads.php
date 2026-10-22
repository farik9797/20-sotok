<?php
/* Заявки из квиза: сохраняются в админке («Заявки») и уходят на почту, указанную в «Настройках сайта».
   Если там же заданы бот и чат Telegram — дублируются в Telegram. */

add_action('init', function () {
    register_post_type('s20_lead', [
        'labels'        => ['name' => 'Заявки', 'singular_name' => 'Заявка', 'menu_name' => 'Заявки',
                            'all_items' => 'Все заявки', 'edit_item' => 'Заявка', 'search_items' => 'Найти заявку',
                            'not_found' => 'Заявок пока нет', 'not_found_in_trash' => 'В корзине заявок нет'],
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_icon'     => 'dashicons-email-alt',
        'menu_position' => 25,
        'supports'      => ['title'],
        'map_meta_cap'  => true,
        'capabilities'  => ['create_posts' => 'do_not_allow'],   // заявки создаёт только форма на сайте
    ]);
});

// поля заявки: ключ метаданных → подпись
function s20_lead_labels() {
    return ['direction' => 'Направление', 'area' => 'Площадь мощения', 'style' => 'Формат плитки',
            'systems' => 'Системы', 'messenger' => 'Мессенджер', 'phone' => 'Телефон', 'page' => 'Страница',
            'delivery' => 'Доставка уведомления'];
}

add_action('rest_api_init', function () {
    register_rest_route('s20/v1', '/lead', [
        'methods'             => 'POST',
        'permission_callback' => '__return_true',
        'callback'            => 's20_lead_submit',
    ]);
});

function s20_lead_submit(WP_REST_Request $request) {
    $p = $request->get_json_params();
    if (!is_array($p)) return new WP_Error('s20_bad', 'Неверный запрос', ['status' => 400]);

    // ловушка для ботов (скрытое поле) и слишком быстрая отправка: отвечаем «ок», но не сохраняем
    if (!empty($p['website']) || (int) (isset($p['elapsed']) ? $p['elapsed'] : 0) < 3) return ['ok' => true];

    $digits = preg_replace('/\D/', '', (string) (isset($p['phone']) ? $p['phone'] : ''));
    if (strlen($digits) !== 12 || strpos($digits, '375') !== 0) return new WP_Error('s20_phone', 'Неверный номер', ['status' => 422]);
    if (empty($p['consent'])) return new WP_Error('s20_consent', 'Нет согласия на обработку данных', ['status' => 422]);

    // не больше 5 заявок с одного адреса за 10 минут
    $ip  = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    $key = 's20_lead_' . md5($ip);
    $n   = (int) get_transient($key);
    if ($n >= 5) return new WP_Error('s20_rate', 'Слишком много заявок, позвоните нам', ['status' => 429]);
    set_transient($key, $n + 1, 10 * MINUTE_IN_SECONDS);

    $text = function ($k, $max) use ($p) {
        return mb_substr(sanitize_text_field((string) (isset($p[$k]) ? $p[$k] : '')), 0, $max);
    };
    $phone = '+' . $digits;
    $lead = [
        'direction' => $text('direction', 200),
        'area'      => $text('area', 40),
        'style'     => $text('style', 200),
        'systems'   => $text('systems', 400) !== '' ? $text('systems', 400) : 'только мощение',
        'messenger' => in_array(isset($p['messenger']) ? $p['messenger'] : '', ['Telegram', 'Viber'], true) ? $p['messenger'] : '—',
        'phone'     => '+375 (' . substr($digits, 3, 2) . ') ' . substr($digits, 5, 3) . '-' . substr($digits, 8, 2) . '-' . substr($digits, 10, 2),
        'page'      => esc_url_raw((string) (isset($p['page']) ? $p['page'] : '')),
    ];

    $id = wp_insert_post(['post_type' => 's20_lead', 'post_status' => 'private',
                          'post_title' => $lead['phone'] . ' · ' . $lead['messenger']], true);
    if (is_wp_error($id)) return new WP_Error('s20_save', 'Не удалось сохранить заявку', ['status' => 500]);
    foreach ($lead as $k => $v) update_post_meta($id, 's20_' . $k, $v);

    // уведомления
    $labels = s20_lead_labels();
    $lines = [];
    foreach ($lead as $k => $v) $lines[] = $labels[$k] . ': ' . $v;
    $body = "Новая заявка из калькулятора бюджета на сайте.\n\n" . implode("\n", $lines)
          . "\n\nВсе заявки: " . admin_url('edit.php?post_type=s20_lead');
    $to = s20_opt('leads_email', s20_c('email'));
    $mailed = wp_mail($to, 'Заявка с сайта 20sotok.by — ' . $lead['phone'], $body);

    $tg = '';
    $token = trim((string) s20_opt('tg_bot_token', ''));
    $chat  = trim((string) s20_opt('tg_chat_id', ''));
    if ($token !== '' && $chat !== '') {
        $res = wp_remote_post('https://api.telegram.org/bot' . rawurlencode($token) . '/sendMessage', [
            'timeout' => 8,
            'body'    => ['chat_id' => $chat, 'text' => "Заявка с сайта 20sotok.by\n\n" . implode("\n", $lines)],
        ]);
        $tg = (!is_wp_error($res) && wp_remote_retrieve_response_code($res) === 200) ? ', Telegram — отправлено' : ', Telegram — ошибка';
    }
    update_post_meta($id, 's20_delivery', ($mailed ? 'письмо — отправлено на ' . $to : 'письмо — ошибка отправки') . $tg);

    return ['ok' => true];
}

// на локальной копии и на тестовом поддомене письма никуда не уходят — только в журнал,
// чтобы проверочные заявки не попадали заказчику; на боевом сайте (production) отправка обычная
add_filter('pre_wp_mail', function ($null, $atts) {
    if (!in_array(wp_get_environment_type(), ['local', 'staging'], true)) return $null;
    error_log('s20: письмо не отправлено (' . wp_get_environment_type() . ') → ' . (is_array($atts['to']) ? implode(',', $atts['to']) : $atts['to']) . ' | ' . $atts['subject']);
    return true;
}, 10, 2);

// письма с адреса домена — тот же отправитель, что был у старого сайта
add_filter('wp_mail_from', function ($from) { return s20_opt('mail_from', 'postmaster@20sotok.by'); });
add_filter('wp_mail_from_name', function ($name) { return '20 соток — сайт'; });

// список заявок: колонки
add_filter('manage_s20_lead_posts_columns', function ($cols) {
    return ['cb' => $cols['cb'], 'title' => 'Телефон · мессенджер', 's20_direction' => 'Направление',
            's20_area' => 'Площадь', 's20_delivery' => 'Уведомление', 'date' => 'Дата'];
});
add_action('manage_s20_lead_posts_custom_column', function ($col, $id) {
    echo esc_html(get_post_meta($id, $col, true));
}, 10, 2);

// карточка заявки: все поля только для чтения
add_action('add_meta_boxes_s20_lead', function () {
    add_meta_box('s20_lead_data', 'Данные заявки', function ($post) {
        echo '<table class="widefat striped"><tbody>';
        foreach (s20_lead_labels() as $k => $label) {
            $v = get_post_meta($post->ID, 's20_' . $k, true);
            if ($k === 'page' && $v) $v = '<a href="' . esc_url($v) . '" target="_blank" rel="noopener">' . esc_html($v) . '</a>';
            else $v = esc_html($v);
            echo '<tr><th style="width:200px">' . esc_html($label) . '</th><td>' . $v . '</td></tr>';
        }
        echo '</tbody></table>';
    }, 's20_lead', 'normal', 'high');
});
