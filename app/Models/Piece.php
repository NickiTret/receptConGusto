<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;

class Piece extends Model
{

    protected $table = 'pieces';
    protected $fillable = ['title', 'description', 'piece_id'];

    public function meat()
    {
        return $this->belongsTo(Meat::class, 'piece_id');
    }

    public function steaks() {
        return $this->hasMany(Steaks::class, 'steaks_id');
    }

}
