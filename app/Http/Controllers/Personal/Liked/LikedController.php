<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\UsersLiked;
use Illuminate\Support\Facades\Route;

class LikedController extends Controller {
    public function index() {

        $posts = auth()->user()->likedPosts;

        return view('personal.liked', compact('posts'));
    }

    public function delete(Post $post) {

        auth()->user()->likedPosts()->detach($post->id);

        return back();
    }

    public function addLiked(Post $post) {

        $data['post_id'] = $post->id;
        $data['user_id'] = auth()->user()->id;
        UsersLiked::create($data);
        return back();
    }




}
