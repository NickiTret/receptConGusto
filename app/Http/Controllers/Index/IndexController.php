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
use App\Models\News;

class IndexController extends Controller
{

    public function index()
    {
        $currentURL = url()->full();
        $fasts = Fast::all();
        $heros = Hero::latest()->get();
        $random = Post::all()->random();
        $posts = Post::orderBy('views', 'desc')->limit(4)->get();
        $allPosts = Post::all();
        $features = Feat::all();
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        $lastPost = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('welcome', compact(  'categories', 'tags', 'random' , 'posts',  'heros', 'fasts', 'allPosts', 'currentURL', 'features', 'lastPost'));
    }

    public function show($slug)
    {
        $currentURL = url()->full();
        $fasts = Fast::all();
        $post = Post::where('slug', $slug)->firstOrFail();
        $posts = Post::where('category_id', $post->category_id)->limit(5)->get();
        $post->views += 1;
        $post->update();
        $categories = Category::pluck('title', 'id')->all();
        $category = Category::where('id', $post->category_id)->first();
        $tags = Tag::pluck('title', 'id')->all();
        return view('single', compact( 'post', 'tags', 'categories', 'category', 'fasts', 'posts', 'currentURL'));
    }

    public function fast($slug)
    {

        $post = fast::where('slug', $slug)->first();

        return view('single', compact( 'post'));
    }

    public function category()
    {
        $fasts = Fast::all();
        $banner = Banner::where('page', 'Категории')->firstOrFail();
        $categories = Category::orderBy('title')->get();
        return view('category', compact(  'categories', 'banner', 'fasts'));
    }

    public function tag($id)
    {
        $hat = Hat::where('page_name', 'Тег')->first();
        $fasts = Fast::all();
        $tag = Tag::where('id', $id)->firstOrFail();
        $posts = $tag->posts()->orderBy('id', 'desc')->paginate(50);
        $banner = Banner::where('page', 'Тег')->first();
        return view('tags', compact( 'tag','hat', 'posts', 'banner', 'fasts'));
    }

    public function category_item($slug)
    {
        // $banner = Banner::where('page', 'Категории')->firstOrFail();
        $category_item = Category::where('slug', $slug)->firstOrfail();
        $category_item->descr = "В этом разделе вы найдете блюда из категории “{$category_item->title}”";
        $posts = Post::where('category_id', $category_item->id)->get();
        return view('category-item', compact(  'posts', 'category_item'));
    }

    public function search(Request $request) {
        $request->validate([
            's' => 'required',
        ]);
        $currentURL = url()->full();
        $s = $request->s;
        $postsAll = Post::where('title', 'LIKE', "%{$s}%")->with('category')->paginate(20);
        $fastsAll = Fast::where('title', 'LIKE', "%{$s}%")->paginate(20);

        $posts = $postsAll->merge($fastsAll);

        return view('search', compact('posts', 's',  'currentURL'));
    }

    public function about() {
        $hat = Hat::where('page_name', 'О сайте')->first();
        return view('about', compact( 'hat'));
    }

    public function news()
    {
        $currentURL = url()->full();
        $fasts = Fast::all();
        $posts = News::orderBy('views', 'desc')->get();
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('news', compact(  'categories', 'tags', 'posts', 'fasts', 'currentURL'));
    }

    public function new($slug)
    {
        $currentURL = url()->full();
        $fasts = Fast::all();
        $post = News::where('slug', $slug)->firstOrFail();
        $posts = News::orderBy('views', 'desc')->get();
        $post->views += 1;
        return view('single', compact( 'post', 'fasts', 'posts', 'currentURL'));
    }
}
