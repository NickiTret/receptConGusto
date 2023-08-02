<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use illuminate\Http\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function uploadImage(Request $request, $avatar = null)
    {
        if ($request->hasFile('avatar')) {

            if ($avatar) {
                Storage::delete($avatar);
            }

            $folder = date('Y-m-d');

            return $request->file('avatar')->store("images/users/{$folder}");
        }

        return $avatar;
    }

    public function addImageFormat () {
        if ($this->avatar) {
            return $this->images = [
                'imageDefault' => $this->avatar,
                // 'imageAvif' => str_replace('.jpg', '.avif', $this->avatar),
                'imageWebp' => str_replace('.jpg', '.wepb', $this->avatar)
            ];
        }
    }


    public function getImage()
    {
        if (!$this->avatar) {
            return asset("assets/admin/img/noavatar.jpeg");
        }

        return asset($this->avatar);
    }





    public function likedPosts() {
        return $this->belongsToMany(Post::class, 'post_user_likes', 'user_id', 'post_id');
    }

    public function hasLiked($post) {
        $posts = auth()->user()->likedPosts->contains($post);
        return $posts;
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
}
