<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name', 'calories', 'proteins', 'fats', 'carbohydrates',
        'potassium', 'phosphorus', 'sodium', 'magnesium', 'group_id'
    ];

    public function group()
    {
        return $this->belongsTo(ProductGroup::class);
    }
}
