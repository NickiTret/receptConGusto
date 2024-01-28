<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;
use Intervention\Image\Facades\Image;




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

            // имя файла без рашрешении
            // $file = $request->file('thumbnail')->getClientOriginalName();
            // $fileName = pathinfo($file, PATHINFO_FILENAME);
            // open an image file
            // $img = Image::make($request->file('thumbnail'))->orientate()->encode('webp', 75)->save(("images/{$folder}/" .  $fileName . '.webp'));

            return $request->file('thumbnail')->store("images/{$folder}");
        }

        return $image;
    }

    public static function uploadImageWebp(Request $request, $imageWebp = null)
    {
        if ($request->hasFile('thumbnail')) {

            if ($imageWebp) {
                Storage::delete($imageWebp);
            }

            // имя файла без рашрешении
            $fileName = pathinfo($request['thumbnail']->hashName(), PATHINFO_FILENAME);
            $folder = date('Y-m-d');
            // open an image file
            return $imgWebp = Image::make($request['thumbnail'])->orientate()->encode('webp', 75)->save(("images/{$folder}/" .  $fileName . '.webp'));
        }

        return $imageWebp;
    }

    public function addImageFormat()
    {
        if ($this->thumbnail) {
            return $this->images = [
                'imageDefault' => $this->thumbnail,
                'imageAvif' => str_replace(['.jpg', '.jpeg', '.png'], '.avif', $this->thumbnail),
                'imageWebp' => str_replace(['.jpg', '.jpeg', '.png'], '.webp', $this->thumbnail)
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

    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }
}
