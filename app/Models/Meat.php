<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;

class Meat extends Model
{

    protected $table = 'meats';
    protected $fillable = ['title', 'description', 'svg_meat'];

    public function pieces() {
        return $this->hasMany(Piece::class, 'meat_id');
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('svg_meat')) {

            if ($image) {
                Storage::delete($image);
            }

            $folder = date('Y-m-d');

            return $request->file('svg_meat')->store("images/{$folder}");
        }

        return $image;
    }

    public function getImage()
    {
        if (!$this->svg_meat) {
            return asset("assets/admin/img/no-image.jpeg");
        }

        return asset($this->svg_meat);
    }

}
