<?php
/* <title>, description, Open Graph и canonical — как в макете; переопределяются полями «SEO» страницы. */

function s20_seo_defaults() {
    static $all = null;
    if ($all === null) $all = require __DIR__ . '/seo-defaults.php';
    $path = s20_current_path();
    return ($path !== null && isset($all[$path])) ? $all[$path] : null;
}

function s20_seo_head() {
    $d  = s20_seo_defaults();
    $id = is_page() ? get_queried_object_id() : 0;
    if (!$d) {
        // страницы вне макета (404 и т. п.)
        $d = ['title' => wp_get_document_title(), 'description' => '', 'og_title' => '', 'og_description' => '', 'og_image' => 'img/og.jpg'];
    }
    $own_title = $id ? s20_field('seo_title', '', $id) : '';
    $own_desc  = $id ? s20_field('seo_description', '', $id) : '';
    $title    = $own_title !== '' ? $own_title : $d['title'];
    $desc     = $own_desc !== '' ? $own_desc : $d['description'];
    $og_title = $own_title !== '' ? $own_title : ($d['og_title'] !== '' ? $d['og_title'] : $title);
    $og_desc  = $own_desc !== '' ? $own_desc : ($d['og_description'] !== '' ? $d['og_description'] : $desc);
    $url      = is_front_page() ? home_url('/') : ($id ? get_permalink($id) : '');

    echo '<title>' . esc_html($title) . "</title>\n";
    if ($desc !== '') echo '<meta name="description" content="' . esc_attr($desc) . "\">\n";
    echo "<meta property=\"og:type\" content=\"website\">\n";
    echo "<meta property=\"og:site_name\" content=\"20 соток\">\n";
    echo "<meta property=\"og:locale\" content=\"ru_RU\">\n";
    echo '<meta property="og:title" content="' . esc_attr($og_title) . "\">\n";
    if ($og_desc !== '') echo '<meta property="og:description" content="' . esc_attr($og_desc) . "\">\n";
    if ($url) echo '<meta property="og:url" content="' . esc_url($url) . "\">\n";
    echo '<meta property="og:image" content="' . esc_url(S20_A . $d['og_image']) . "\">\n";
    echo "<meta property=\"og:image:width\" content=\"1200\">\n";
    echo "<meta property=\"og:image:height\" content=\"630\">\n";
    echo "<meta name=\"twitter:card\" content=\"summary_large_image\">\n";
    if ($url) echo '<link rel="canonical" href="' . esc_url($url) . "\">\n";
}
