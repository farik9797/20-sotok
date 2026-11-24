<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** Страница сайта в админке: ключ её полей (resources/site/fields/<key>.php) и адрес. */
class SitePage extends Model
{
    protected $fillable = ['key', 'path', 'title', 'sort'];
}
