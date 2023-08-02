<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;

class Hero extends Model
{
    protected $table = 'hero';
    protected $fillable = ['title', 'link', 'description', 'category_id', 'image'];

    // public function hero() {
    //     return $this->belongsToMany(Tag::class)->withTimestamps();
    // }


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
