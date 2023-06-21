<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'tags')->paginate(120);
        return view('Admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('Admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        Cache::flush();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image|mimes:jpg',
            'video' => 'nullable'
        ]);

        $data = $request->all();

        $data['thumbnail'] = Post::uploadImage($request);

        $post = Post::create($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Статья добавлена');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('Admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    public function update(Request $request, $id)
    {
        Cache::flush();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image|mimes:jpg',
            'video' => 'nullable'
        ]);



        $post = Post::find($id);
        $data = $request->all();

        $data['thumbnail'] = Post::uploadImage($request, $post->thumbnail);

        $post->update($data);
        $post->tags()->sync($request->tags);




        return redirect()->route('posts.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        Cache::flush();
       $post = Post::find($id);
       $post->tags()->sync([]);
       Storage::delete($post->thumbnail);
       $post->delete();
        return redirect()->route('posts.index')->with('success', 'Статья удалена');
    }
}
