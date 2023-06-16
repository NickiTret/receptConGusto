<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;

class Fast extends Model
{
    use Sluggable;

    protected $table = 'fasts';
    protected $fillable = ['title', 'slug', 'description', 'content', 'image'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function addImageFormat () {
        if ($this->image) {
            return $this->images = [
                'imageDefault' => $this->image,
                'imageAvif' => str_replace('.jpg', '.avif', $this->image),
                'imageWebp' => str_replace('.jpg', '.wepb', $this->image)
            ];
        }
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('image')) {

            if ($image)
            {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');

            return $request->file('image')->store("images/{$folder}");
        }

        return $image;
    }

    public function getImage()
    {
        if(!$this->image)
        {
            return asset("assets/admin/img/no-image.jpeg");
        }

        return asset($this->image);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter) {
        return $filter->apply($builder);
    }

}
