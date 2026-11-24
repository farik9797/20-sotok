<?php

namespace App\Http\Controllers;

use App\Support\Site;
use Illuminate\Http\Response;

class SiteController extends Controller
{
    /** Страница сайта по её пути ('' — главная). */
    public function show(string $path = ''): \Illuminate\Contracts\View\View
    {
        Site::setPath($path);

        return view(Site::PAGES[$path][1]);
    }

    /** Карта сайта: 11 страниц, как wp-sitemap.xml у WordPress. */
    public function sitemap(): Response
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n".'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
        foreach (array_keys(Site::PAGES) as $path) {
            $xml .= '<url><loc>'.e(s20_url($path)).'</loc></url>'."\n";
        }

        return response($xml.'</urlset>'."\n", 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    public function robots(): Response
    {
        $txt = "User-agent: *\nDisallow: /admin\n\nSitemap: ".url('/sitemap.xml')."\n";

        return response($txt, 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    }
}
