<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;

class Header extends Model
{
    protected $table = 'header';
    protected $fillable = ['title', 'link'];

    // public function hero() {
    //     return $this->belongsToMany(Tag::class)->withTimestamps();
    // }

}
