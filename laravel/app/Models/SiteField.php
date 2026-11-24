<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** Значение поля сайта: ключ → текст или путь к картинке. */
class SiteField extends Model
{
    protected $primaryKey = 'key';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['key', 'value'];
}
