<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersLiked extends Model
{
    protected $table = 'post_user_likes';
    protected $fillable = ['post_id', 'user_id'];

}
