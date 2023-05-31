<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Filters\ReceptFilter;

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
use App\Models\Sous;
use App\Models\Subcat;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{

    public function index()
    {
        if (Cache::has(('fasts'))) {
            $fasts = Cache::get('fasts');
        } else {
            $fasts = Fast::all();
            Cache::put('fasts', $fasts, 604800);
        }

        if (Cache::has(('heros'))) {
            $heros = Cache::get('heros');
        } else {
            $heros = Hero::latest()->get();
            Cache::put('heros', $heros, 604800);
        }

        if (Cache::has(('random'))) {
            $random = Cache::get('random');
        } else {
            $random = Post::all()->random();
            Cache::put('random', $random, 604800);
        }

        if (Cache::has(('posts'))) {
            $posts = Cache::get('posts');
        } else {
            $posts = Post::orderBy('views', 'desc')->limit(4)->get();
            Cache::put('posts', $posts, 604800);
        }

        if (Cache::has(('allPosts'))) {
            $allPosts = Cache::get('allPosts');
        } else {
            $allPosts = Post::all();
            Cache::put('allPosts', $allPosts, 604800);
        }

        // if(Cache::has(('features'))) {
        //     $features = Cache::get('features');
        // } else {
        //     $features = Feat::all();
        //     Cache::put('features', $features, 604800 );
        // }

        if (Cache::has(('categories'))) {
            $categories = Cache::get('categories');
        } else {
            $categories = Category::pluck('title', 'id')->all();
            Cache::put('categories', $categories, 604800);
        }

        if (Cache::has(('tags'))) {
            $tags = Cache::get('tags');
        } else {
            $tags = Tag::pluck('title', 'id')->all();
            Cache::put('tags', $tags, 604800);
        }


        $currentURL = url()->full();
        $maps = Tag::orderBy('created_at', 'desc')->get();
        $lastPost = Post::orderBy('created_at', 'desc')->limit(4)->get();

        return view('welcome', compact('categories', 'tags', 'maps', 'random', 'posts',  'heros', 'fasts', 'allPosts', 'currentURL', 'lastPost'));
    }

    public function show($slug)
    {

        if (Cache::has(('fasts'))) {
            $fasts = Cache::get('fasts');
        } else {
            $fasts = Fast::all();
            Cache::put('fasts', $fasts, 604800);
        }

        $currentURL = url()->full();

        $post = Post::where('slug', $slug)->firstOrFail();
        $posts = Post::where('category_id', $post->category_id)->limit(5)->get();
        $post->views += 1;
        $post->update();
        $categories = Category::pluck('title', 'id')->all();
        $category = Category::where('id', $post->category_id)->first();
        $tags = Tag::pluck('title', 'id')->all();
        return view('single', compact('post', 'tags', 'categories', 'category', 'fasts', 'posts', 'currentURL'));
    }

    public function fast($slug)
    {

        if (Cache::has(('posts'))) {
            $posts = Cache::get('posts');
        } else {
            $posts = Fast::all();
            Cache::put('posts', $posts, 604800);
        }


        $currentURL = url()->full();
        $post = Fast::where('slug', $slug)->first();
        return view('single', compact('post', 'posts', 'currentURL'));
    }

    public function category()
    {
        $fasts = Fast::all();
        $banner = Banner::where('page', 'Категории')->firstOrFail();
        $categories = Category::orderBy('title')->get();
        return view('category', compact('categories', 'banner', 'fasts'));
    }

    public function tag($id)
    {
        $hat = Hat::where('page_name', 'Тег')->first();
        $fasts = Fast::all();
        $tag = Tag::where('id', $id)->firstOrFail();
        $posts = $tag->posts()->orderBy('id', 'desc')->paginate(50);
        $banner = Banner::where('page', 'Тег')->first();
        return view('tags', compact('tag', 'hat', 'posts', 'banner', 'fasts'));
    }

    public function category_item($slug)
    {
        // $banner = Banner::where('page', 'Категории')->firstOrFail();
        $category_item = Category::where('slug', $slug)->firstOrfail();
        $posts = Post::where('category_id', $category_item->id)->get();
        return view('category-item', compact('posts', 'category_item'));
    }

    //    public function search(Request $request) {
    //        $request->validate([
    //            's' => 'required',
    //        ]);
    //        $currentURL = url()->full();
    //        $s = $request->s;
    //        $postsAll = Post::where('title', 'LIKE', "%{$s}%")->with('category')->paginate(20);
    //        $fastsAll = Fast::where('title', 'LIKE', "%{$s}%")->paginate(20);
    //
    //        $posts = $postsAll->merge($fastsAll);
    //
    //        return view('search', compact('posts', 's',  'currentURL'));
    //    }

    public function search(ReceptFilter $filter)
    {

        $currentURL = url()->full();
        $category = Category::all();
        $postsAll = Post::filter($filter)->paginate(100);
        $fasts = Fast::filter($filter)->paginate(20);
        $posts = $postsAll->merge($fasts);

        return view('search', compact('posts', 'category',  'currentURL'));
    }

    public function about()
    {
        $hat = Hat::where('page_name', 'О сайте')->first();
        return view('about', compact('hat'));
    }

    public function news()
    {

        $currentURL = url()->full();
        $fasts = Fast::all();
        $posts = News::where('restorant', 0)->orderBy('views', 'desc')->get();
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('news', compact('categories', 'tags', 'posts', 'fasts', 'currentURL'));
    }

    public function new($slug)
    {
        $currentURL = url()->full();
        $fasts = Fast::all();
        $post = News::where('slug', $slug)->firstOrFail();
        $posts = Post::orderBy('views', 'desc')->limit(4)->get();
        $post->views += 1;

        $post->update();

        return view('single', compact('post', 'fasts', 'posts', 'currentURL'));
    }

    public function marinade()
    {
        $currentURL = url()->full();
        $slider = Sous::where('marinade', 1)->get()->toJson();
        $groups = Subcat::all();
        $banner = Banner::where('page', 'Коллекция маринадов')->firstOrFail();
        return view('marinade', compact('currentURL', 'groups', 'slider', 'banner'));
    }

    public function dessert()
    {
        $data = (object) [
            'title' => 'Пирожные на заказ СПб',
            'description' => 'ДЕСЕРТЫ, КОТОРЫЕ МИНУЯ ЖЕЛУДОК, ПОПАДАЮТ ПРЯМО В СЕРДЦЕ! Наполеончики к чаю',
          ];
        $fasts = Fast::all();
        $banner = Banner::where('page', 'Категории')->firstOrFail();
        return view('dessert', compact( 'banner', 'data' ));
    }
}
