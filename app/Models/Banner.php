<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;

class Banner extends Model
{

    protected $table = 'banners';
    protected $fillable = ['title', 'subtitle', 'description', 'content',  'image', 'page', 'btn_name', 'btn_link'];


    public function page()
    {
        return $this->hasOne(Header::class, 'title');
    }


    public function addImageFormat () {
        if ($this->image) {
            return $this->images = [
                'imageDefault' => $this->image,
                'imageAvif' => str_replace(['.jpg', '.jpeg', '.png'], '.avif', $this->image),
                'imageWebp' => str_replace(['.jpg', '.jpeg', '.png'], '.webp', $this->image)
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
