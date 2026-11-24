<?php

namespace App\Support;

use App\Models\SiteField;

/**
 * Состояние текущей страницы и доступ к полям — то же, что делает тема WordPress
 * (wp-theme/sotok20/inc/helpers.php): значение из админки или текст макета.
 */
class Site
{
    // путь страницы → ключ полей (resources/site/fields/<ключ>.php) и Blade-вид
    public const PAGES = [
        '' => ['home', 'pages.home'],
        'o-kompanii' => ['o_kompanii', 'pages.o-kompanii'],
        'uslugi' => ['uslugi', 'pages.uslugi'],
        'uslugi/plitka' => ['plitka', 'pages.plitka'],
        'uslugi/gazon' => ['gazon', 'pages.gazon'],
        'uslugi/poliv' => ['poliv', 'pages.poliv'],
        'uslugi/drenazh' => ['drenazh', 'pages.drenazh'],
        'proekty' => ['proekty', 'pages.proekty'],
        'blog' => ['blog', 'pages.blog'],
        'kontakty' => ['kontakty', 'pages.kontakty'],
        'politika' => ['politika', 'pages.politika'],
    ];

    // «Настройки сайта»: ключ → [подпись, значение из макета]
    public const OPTIONS = [
        'phone' => ['Телефон', '+375 (44) 517-30-50'],
        'telegram_url' => ['Telegram — ссылка', 'https://t.me/+375445173050'],
        'viber_url' => ['Viber — ссылка', 'viber://chat?number=%2B375445173050'],
        'email' => ['E-mail', 'by20sotok@gmail.com'],
        'instagram_url' => ['Instagram — ссылка', 'https://www.instagram.com/20sotok.by/'],
        'hours' => ['Время работы', 'Ежедневно 9:00–20:00'],
        'company' => ['Исполнитель (ИП / организация)', 'ИП Денисов Евгений Игоревич'],
        'unp' => ['УНП', '193435021'],
        'office' => ['Адрес офиса', 'г. Минск, ул. Козыревская, 15, офис 604'],
        'leads_email' => ['Куда присылать заявки (e-mail)', 'by20sotok@gmail.com'],
        'mail_from' => ['Адрес отправителя писем', 'postmaster@20sotok.by'],
        'tg_bot_token' => ['Telegram: токен бота', ''],
        'tg_chat_id' => ['Telegram: ID чата', ''],
        'site_icon' => ['Иконка сайта', 'site-icon.png'],   // путь в public/uploads
    ];

    public static ?string $path = null;   // '', 'uslugi', 'uslugi/plitka'; null — 404

    private static ?array $values = null;

    private static array $fields = [];

    public static function setPath(?string $path): void
    {
        self::$path = $path;
    }

    public static function pageKey(): ?string
    {
        return self::$path === null ? null : self::PAGES[self::$path][0];
    }

    public static function navKey(): string
    {
        if (self::$path === null) {
            return '';
        }
        if (self::$path === '') {
            return 'home';
        }
        $first = explode('/', self::$path)[0];

        return in_array($first, ['o-kompanii', 'uslugi', 'proekty', 'blog', 'kontakty'], true) ? $first : '';
    }

    /** Значение из админки; null — пусто (тогда выводится текст макета). */
    public static function value(string $key): ?string
    {
        if (self::$values === null) {
            self::$values = SiteField::query()->pluck('value', 'key')->all();
        }
        $v = self::$values[$key] ?? null;

        return ($v === null || $v === '') ? null : (string) $v;
    }

    public static function forget(): void
    {
        self::$values = null;
    }

    /** Поля страницы из макета: ключ → описание (тип, вкладка, подпись, значение по умолчанию). */
    public static function pageFields(string $page): array
    {
        if (! isset(self::$fields[$page])) {
            $file = resource_path('site/fields/'.basename($page).'.php');
            $group = is_file($file) ? require $file : ['fields' => []];
            $map = [];
            foreach ($group['fields'] as $f) {
                $map[$f['key']] = $f;
            }
            self::$fields[$page] = $map;
        }

        return self::$fields[$page];
    }

    public static function pageTitle(string $page): string
    {
        $file = resource_path('site/fields/'.basename($page).'.php');

        return is_file($file) ? (require $file)['title'] : $page;
    }

    public static function fieldDef(string $key): ?array
    {
        $page = preg_replace('/_(s\d\d|x)_\d\d$/', '', $key);

        return self::pageFields($page)[$key] ?? null;
    }

    public static function seoDefaults(): array
    {
        static $all = null;

        return $all ??= require resource_path('site/seo-defaults.php');
    }

    public static function version(): string
    {
        return require resource_path('site/version.php');
    }

    /**
     * Разметка, которую можно вводить в текстовых полях (как wp_kses в теме):
     * разрешённые теги и атрибуты остаются, остальные теги снимаются с сохранением текста.
     */
    public static function kses(string $html): string
    {
        $common = ['class', 'style', 'aria-hidden', 'aria-label'];
        $allowed = [
            'a' => [...$common, 'href', 'target', 'rel'],
            'b' => $common, 'strong' => $common, 'em' => $common, 'i' => $common, 'span' => $common,
            'small' => $common, 'sup' => $common, 'sub' => $common, 'mark' => $common, 'br' => $common,
            'svg' => [...$common, 'viewbox'], 'use' => ['href'],
        ];
        $doc = new \DOMDocument;
        libxml_use_internal_errors(true);
        $doc->loadHTML('<?xml encoding="utf-8"?><div id="s20-root">'.$html.'</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $root = $doc->getElementById('s20-root');
        if (! $root) {
            return e(strip_tags($html));
        }
        self::cleanNode($root, $allowed);
        $out = '';
        foreach ($root->childNodes as $child) {
            $out .= $doc->saveHTML($child);
        }

        return $out;
    }

    private static function cleanNode(\DOMNode $node, array $allowed): void
    {
        foreach (iterator_to_array($node->childNodes) as $child) {
            if ($child instanceof \DOMComment || $child instanceof \DOMProcessingInstruction) {
                $node->removeChild($child);

                continue;
            }
            if (! $child instanceof \DOMElement) {
                continue;
            }
            $tag = strtolower($child->tagName);
            if (in_array($tag, ['script', 'style', 'iframe', 'object', 'embed'], true)) {
                $node->removeChild($child);

                continue;
            }
            self::cleanNode($child, $allowed);
            if (! isset($allowed[$tag])) {
                while ($child->firstChild) {
                    $node->insertBefore($child->firstChild, $child);
                }
                $node->removeChild($child);

                continue;
            }
            foreach (iterator_to_array($child->attributes) as $attr) {
                $name = strtolower($attr->name);
                $ok = in_array($name, $allowed[$tag], true);
                if ($ok && $name === 'href') {
                    $ok = (bool) preg_match('~^(https?:|mailto:|tel:|viber:|tg:|/|#|\.)~i', trim($attr->value));
                }
                if ($ok && $name === 'style') {
                    $ok = ! preg_match('~(expression|url\s*\(|javascript:)~i', $attr->value);
                }
                if (! $ok) {
                    $child->removeAttribute($attr->name);
                }
            }
        }
    }
}
