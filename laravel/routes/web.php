<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\SiteController;
use App\Http\Middleware\TrailingSlash;
use App\Support\Site;
use Illuminate\Support\Facades\Route;

// страницы сайта — адреса как у WordPress, со слешем в конце
Route::middleware(TrailingSlash::class)->group(function () {
    foreach (array_keys(Site::PAGES) as $path) {
        Route::get($path === '' ? '/' : $path, [SiteController::class, 'show'])->defaults('path', $path);
    }
});

Route::post('/lead', [LeadController::class, 'store'])->name('lead');

Route::get('/sitemap.xml', [SiteController::class, 'sitemap']);
Route::get('/robots.txt', [SiteController::class, 'robots']);
// старая карта сайта WordPress
Route::permanentRedirect('/wp-sitemap.xml', '/sitemap.xml');
