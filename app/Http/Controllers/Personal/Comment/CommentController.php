<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller {
    // public function index() {

    //     $posts = auth()->user()->likedPosts;

    //     return view('personal.liked', compact('posts'));
    // }

    // public function delete(Post $post) {

    //     auth()->user()->likedPosts()->detach($post->id);
    //     return back();
    // }

    public function addComment(Post $post, Request $request) {

        $request->validate([
            'message' => 'required',
        ]);

        $data['message'] = $request->message;
        $data['post_id'] = $post->id;
        $data['user_id'] = auth()->user()->id;

        Comment::create($data);

        return back();
    }

    public function addLike(Comment $comment) {
        $comment->likes += 1;
        $comment->update();

        return back();
    }




}
