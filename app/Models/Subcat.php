<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;

//картинки
use Intervention\Image\Facades\Image;

class Subcat extends Model
{
    // use Sluggable;

    protected $table = 'sub_category';
    protected $fillable = ['title'];

    public function sous() {
        return $this->hasMany(Sous::class, 'sub_category_id');
    }

}
