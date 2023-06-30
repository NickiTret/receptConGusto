<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;





class Comment extends Model
{

    protected $table = 'comments';
    protected $guarded = false;

    protected $fillable = ['post_id', 'user_id', 'message', 'likes'];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


}
