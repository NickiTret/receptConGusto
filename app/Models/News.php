<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;

//картинки
use Intervention\Image\Facades\Image;

class News extends Model
{
    use Sluggable;

    protected $table = 'news';
    protected $fillable = ['title', 'slug', 'description', 'content', 'views', 'image', 'alt_img', 'restorant', 'show'];

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

    public function addImageFormat () {
        if ($this->image) {
            return $this->images = [
                'imageDefault' => $this->image,
                // 'imageAvif' => str_replace('.jpg', '.avif', $this->image),
                'imageWebp' => str_replace('.jpg', '.wepb', $this->image)
            ];
        }
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
