<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** Заявка из квиза. */
class Lead extends Model
{
    protected $fillable = ['direction', 'area', 'style', 'systems', 'messenger', 'phone', 'page', 'delivery'];

    // поле → подпись (как s20_lead_labels в теме)
    public const LABELS = [
        'direction' => 'Направление', 'area' => 'Площадь мощения', 'style' => 'Формат плитки',
        'systems' => 'Системы', 'messenger' => 'Мессенджер', 'phone' => 'Телефон', 'page' => 'Страница',
        'delivery' => 'Доставка уведомления',
    ];
}
