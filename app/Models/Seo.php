<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;

class Seo extends Model
{

    protected $table = 'seo_meta';
    protected $fillable = ['title', 'description', 'meta_tags',  'keywords', 'name_page', 'image_page'];


    public static function uploadImage(Request $request, $image_page = null)
    {
        if ($request->hasFile('image_page')) {

            if ($image_page)
            {
                Storage::delete($image_page);
            }
            $folder = date('Y-m-d');

            return $request->file('image_page')->store("images/{$folder}");
        }

        return $image_page;
    }

    public function getImage()
    {
        if(!$this->image_page)
        {
            return asset("assets/admin/img/no-image.jpeg");
        }

        return asset($this->image_page);
    }

}
