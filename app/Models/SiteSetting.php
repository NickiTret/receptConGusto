<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    const TYPES = [
        'seo' => 'SEO Настройки',
        'contacts' => 'Контакты',
        'pages' => 'Страница',
        'order' => 'Заказ'
    ];
    protected $table = 'site_settings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'group',
        'value',
    ];
}
