<?php

namespace Database\Seeders;

use App\Models\SitePage;
use App\Support\Site;
use Illuminate\Database\Seeder;

class SitePageSeeder extends Seeder
{
    /** Страницы сайта для админки — по списку Site::PAGES, названия из описаний полей. */
    public function run(): void
    {
        $sort = 0;
        foreach (Site::PAGES as $path => [$key]) {
            SitePage::updateOrCreate(['key' => $key], [
                'path' => $path === '' ? '/' : '/'.$path.'/',
                'title' => Site::pageTitle($key),
                'sort' => ++$sort,
            ]);
        }
    }
}
