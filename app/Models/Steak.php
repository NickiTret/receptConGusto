<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;

class Steak extends Model
{

    protected $table = 'steaks';
    protected $fillable = ['title', 'description', 'image', 'content', 'steaks_id'];

    public function piece()
    {
        return $this->belongsTo(Piece::class, 'steaks_id');
    }


    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('image')) {

            if ($image) {
                Storage::delete($image);
            }

            $folder = date('Y-m-d');

            return $request->file('image')->store("images/{$folder}");
        }

        return $image;
    }


    public function getImage()
    {
        if (!$this->image) {
            return asset("assets/admin/img/no-image.jpeg");
        }

        return asset($this->image);
    }

}
