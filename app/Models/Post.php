<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;





class Post extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'content', 'description', 'category_id', 'thumbnail', 'video', 'show'];

    // protected $with = ['category'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('thumbnail')) {

            if ($image) {
                Storage::delete($image);
            }

            $folder = date('Y-m-d');

            return $request->file('thumbnail')->store("images/{$folder}");
        }

        return $image;
    }

    public function addImageFormat () {
        if ($this->thumbnail) {
            return $this->images = [
                'imageDefault' => $this->thumbnail,
                // 'imageAvif' => str_replace('.jpg', '.avif', $this->thumbnail),
                'imageWebp' => str_replace('.jpg', '.wepb', $this->thumbnail)
            ];
        }
    }


    public function getImage()
    {
        if (!$this->thumbnail) {
            return asset("assets/admin/img/no-image.jpeg");
        }

        return asset($this->thumbnail);
    }

    //filter

    public function scopeFilter(Builder $builder, QueryFilter $filter) {
        return $filter->apply($builder);
    }
}
