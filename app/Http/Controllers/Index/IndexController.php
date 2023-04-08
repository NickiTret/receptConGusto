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
        $heros = Hero::latest()->get();
        $random = Post::all()->random();
        $posts = Post::inRandomOrder()->limit(4)->get();
        $features = Feat::all();
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('welcome', compact(  'categories', 'tags', 'random' , 'posts',  'heros', 'fasts', 'currentURL', 'features'));
    }

    public function show($id)
    {

        $fasts = Fast::all();
        $post = Post::where('id', $id)->firstOrFail();
        $posts = Post::where('category_id', $post->category_id)->limit(5)->get();
        $post->views += 1;
        $post->update();
        $categories = Category::pluck('title', 'id')->all();
        $category = Category::where('id', $post->category_id)->first();
        $tags = Tag::pluck('title', 'id')->all();
        return view('single', compact( 'post', 'tags', 'categories', 'category', 'fasts', 'posts'));
    }

    public function fast($id)
    {

        $post = fast::where('id', $id)->first();

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

    public function category_item($id)
    {
        // $banner = Banner::where('page', 'Категории')->firstOrFail();
        $category_item = Category::find($id);
        $category_item->descr = "В этом разделе вы найдете блюда из категории “{$category_item->title}”";
        $posts = Post::where('category_id', $id)->get();
        return view('category-item', compact(  'posts', 'category_item'));
    }

    public function search(Request $request) {
        $request->validate([
            's' => 'required',
        ]);
        $currentURL = url()->full();
        $s = $request->s;
        $posts = Post::where('title', 'LIKE', "%{$s}%")->with('category')->paginate(20);

        return view('search', compact('posts', 's',  'currentURL'));
    }

    public function about() {
        $hat = Hat::where('page_name', 'О сайте')->first();


        return view('about', compact( 'hat'));
    }

}
