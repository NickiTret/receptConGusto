<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;

class Hat extends Model
{
    // use Sluggable;
    
    protected $table = 'table_hat';
    protected $fillable = ['title', 'page_name', 'content', 'image'];


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

        return null;
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
