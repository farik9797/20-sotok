#!/bin/bash
# Локальный WordPress: страницы с адресами макета, шаблоны, главная, постоянные ссылки.
set -e
L="$(cd "$(dirname "$0")/../../.wp-local" && pwd)"
wp() { "$L/wp.sh" "$@" 2>/dev/null; }
page_id() { wp post list --post_type=page --name="$1" ${2:+--post_parent=$2} --field=ID --format=ids | head -1; }
assign() { local id; id=$(page_id "$1" "$3"); [ -n "$id" ] && wp post meta update "$id" _wp_page_template "$2" >/dev/null && echo "  $1 → $2"; }
US=$(page_id uslugi)
assign o-kompanii page-o-kompanii.php
assign uslugi page-uslugi.php
assign plitka page-plitka.php "$US"
assign gazon page-gazon.php "$US"
assign poliv page-poliv.php "$US"
assign drenazh page-drenazh.php "$US"
assign proekty page-proekty.php
assign blog page-blog.php
assign kontakty page-kontakty.php
assign politika page-politika.php
wp rewrite flush >/dev/null && echo "постоянные ссылки обновлены"
