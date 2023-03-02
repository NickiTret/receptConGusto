<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Header;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Hero;
use App\Models\Fast;
use App\Models\Feat;
use App\Models\Banner;
use App\Models\Hat;

class IndexController extends Controller
{
   
    public function index()
    {
        $currentURL = url()->full();
        $fasts = Fast::all();
        $heros = Hero::all();
        $headers = Header::all();
        $random = Post::all()->random();
        $posts = Post::all();
        $features = Feat::all();
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('welcome', compact( 'headers', 'categories', 'tags', 'random' , 'posts',  'heros', 'fasts', 'currentURL', 'features'));
    }

    public function show($id)
    {
        
        $headers = Header::all();
        $fasts = Fast::all();
        $post = Post::where('id', $id)->firstOrFail();
        $posts = Post::where('category_id', $post->category_id)->limit(5)->get();
        $post->views += 1;
        $post->update();
        $categories = Category::pluck('title', 'id')->all();
        $category = Category::where('id', $post->category_id)->first();
        $tags = Tag::pluck('title', 'id')->all();
        return view('single', compact( 'headers','post', 'tags', 'categories', 'category', 'fasts', 'posts'));
    }

    public function fast($id)
    {
        $headers = Header::all();

        $post = fast::where('id', $id)->first();

        return view('single', compact( 'headers','post'));
    }

    public function category()
    {
        $fasts = Fast::all();
        $banner = Banner::where('page', 'Категории')->firstOrFail();
        $headers = Header::all();
        $categories = Category::all();
        return view('category', compact( 'headers', 'categories', 'banner', 'fasts'));
    }

    public function category_item($id)
    {
        // $banner = Banner::where('page', 'Категории')->firstOrFail();
        $headers = Header::all();
        $category_item = Category::find($id);
        $category_item->descr = "В этом разделе вы найдете блюда из категории “{$category_item->title}”";
        $posts = Post::where('category_id', $id)->get();
        return view('category-item', compact( 'headers', 'posts', 'category_item'));
    }

    public function search(Request $request) {
        $request->validate([
            's' => 'required',
        ]);
        $currentURL = url()->full();
        $s = $request->s;
        $headers = Header::all();
        $posts = Post::where('title', 'LIKE', "%{$s}%")->with('category')->paginate(20);

        return view('search', compact('posts', 's', 'headers', 'currentURL'));
    }

    public function about() {
        $headers = Header::all();
        $hat = Hat::where('page_name', 'О сайте')->first();


        return view('about', compact('headers', 'hat'));
    }

}
