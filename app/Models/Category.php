<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;

class Category extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'description', 'image'];

    public function posts() {
        return $this->hasMany(Post::class);
    }

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
}
