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
use App\Models\Meat;
use App\Models\News;
use App\Models\Piece;
use App\Models\Seo;
use App\Models\Sous;
use App\Models\Steak;
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

        $random = Post::all()->random();

        if (Cache::has(('posts'))) {
            $posts = Cache::get('posts');
        } else {
            $posts = Post::where('show', '1')->orderBy('views', 'desc')->limit(4)->get();
            Cache::put('posts', $posts, 604800);
        }

        if (Cache::has(('allPosts'))) {
            $allPosts = Cache::get('allPosts');
        } else {
            $allPosts = Post::where('show', '1')->get();
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


        $seo = Seo::where('name_page', 'Главная страница')->first();

        $currentURL = url()->full();
        $maps = Tag::orderBy('title', 'asc')->get();
        $lastPost = Post::where('show', '1')->orderBy('created_at', 'desc')->limit(4)->get();

        return view('welcome', compact('categories', 'tags', 'maps', 'random', 'posts',  'heros', 'fasts', 'allPosts', 'currentURL', 'lastPost', 'seo'));
    }

    public function show($slug)
    {

        if (Cache::has(('fasts'))) {
            $fasts = Cache::get('fasts');
        } else {
            $fasts = Fast::where('show', '1')->get();
            Cache::put('fasts', $fasts, 604800);
        }

        $currentURL = url()->full();

        $post = Post::where('slug', $slug)->firstOrFail();
        $posts = Post::where('show', '1')->where('category_id', $post->category_id)->orderBy('title', 'asc')->get();
        // $posts_tags = Post::where('show', '1')->where('category_id', $post->category_id)->orderBy('title', 'asc')->get();
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
            $posts = Fast::where('show', '1')->get();
            Cache::put('posts', $posts, 604800);
        }


        $currentURL = url()->full();
        $post = Fast::where('slug', $slug)->first();
        return view('single', compact('post', 'posts', 'currentURL'));
    }

    public function category()
    {
        $fasts = Fast::where('show', '1')->get();
        $banner = Banner::where('page', 'Категории')->firstOrFail();
        $categories = Category::orderBy('title')->get();
        $seo = Seo::where('name_page', 'Категории')->first();
        return view('category', compact('categories', 'banner', 'fasts', 'seo'));
    }

    public function tag($id)
    {
        $hat = Hat::where('page_name', 'Тег')->first();
        $fasts = Fast::all();
        $tag = Tag::where('id', $id)->firstOrFail();
        $posts = $tag->posts()->where('show', '1')->orderBy('id', 'desc')->paginate(50);
        $banner = Banner::where('page', 'Тег')->first();

        return view('tags', compact('tag', 'hat', 'posts', 'banner', 'fasts'));
    }

    public function category_item($slug)
    {
        // $banner = Banner::where('page', 'Категории')->firstOrFail();
        $category_item = Category::where('slug', $slug)->firstOrfail();
        $posts = Post::where('show', '1')->where('category_id', $category_item->id)->get();
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
        $seo = Seo::where('name_page', 'Поиск')->first();

        return view('search', compact('posts', 'category',  'currentURL', 'seo'));
    }

    public function about()
    {
        $hat = Hat::where('page_name', 'О сайте')->first();
        $seo = Seo::where('name_page', 'О сайте')->first();
        return view('about', compact('hat', 'seo'));
    }

    public function news()
    {

        if (Cache::has(('posts'))) {
            $posts = Cache::get('posts');
        } else {
            $posts = News::where('show', '1')->where('restorant', 0)->orderBy('views', 'desc')->get();
            Cache::put('posts', $posts, 604800);
        }

        $currentURL = url()->full();
        $fasts = Fast::where('show', '1')->get();

        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        $seo = Seo::where('name_page', 'Статьи')->first();
        return view('news', compact('categories', 'tags', 'posts', 'fasts', 'currentURL', 'seo'));
    }

    public function new($slug)
    {
        $currentURL = url()->full();
        $fasts = Fast::where('show', '1')->get();
        $post = News::where('slug', $slug)->firstOrFail();
        $posts = Post::where('show', '1')->orderBy('views', 'desc')->limit(4)->get();
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
        $seo = Seo::where('name_page', 'Маринады')->first();
        return view('marinade', compact('currentURL', 'groups', 'slider', 'banner', 'seo'));
    }

    public function dessert()
    {
        $data = (object) [
            'title' => 'Пирожные на заказ СПб',
            'description' => 'ДЕСЕРТЫ, КОТОРЫЕ МИНУЯ ЖЕЛУДОК, ПОПАДАЮТ ПРЯМО В СЕРДЦЕ! Наполеончики к чаю',
            'image' => 'https://sun9-67.userapi.com/impg/omytr-P9L6OWwLEqtJEzx_spOiM5YV415sD-zA/7_CCo0_6Iqo.jpg?size=2560x1435&quality=95&sign=c773e9ad023b37acfb73a7bd18a7c5e7&type=album'
        ];
        $fasts = Fast::all();
        $banner = Banner::where('page', 'Категории')->firstOrFail();
        $seo = Seo::where('name_page', 'Десерты')->first();
        return view('dessert', compact('banner', 'data', 'seo'));
    }


    public function steak()
    {

        $data = (object) [
            'title' => 'Всё о стейках',
            'description' => 'Приготовление и маринование стейков',
            'image' => ''
        ];
        // $banner = Banner::where('page', 'Стейк')->firstOrFail();
        $seo = Seo::where('name_page', 'Стейки')->first();
        $meats = Meat::all();
        $pieces = Piece::all();
        $steaks = Steak::all();

        return view('steak', compact('data', 'steaks', 'meats', 'pieces'));
    }

    public function feed()
    {

        $posts = Post::all();
        $all_item = null;
        $newposts = array();

        foreach ($posts as $post) {



            $data_dob = date(DATE_RFC822, strtotime($post['created_at'])); // переводим дату в нужный для RSS формат
            $id = $post['id']; // ид записи (новости)
            $title = $post['title']; // заголовок новости
            $des = strip_tags($post['description']); // описание новости, удаляем все html теги
            $image = $post['thumbnail']; // картинка новости (превью)
            $text = $post['content']; // текст новости (в тексте новости могут быть лишние теги, картинки которые с относительными путями к рисункам, а они должны быть абсолютными)

            // преобразуем пути картинок, т.е вместо /img_news/image.jpg должно быть https://seolik.ru/img_news/image.jpg
            // $text = str_ireplace("/img_news/", "https://seolik.ru/img_news/", $text);

            // ищем все картинки в новости и добавляем их в описании публикации
            // $doc = new DOMDocument();
            // @$doc->loadHTML($text);

            // Преобразует все HTML-сущности в соответствующие символы
            $text = html_entity_decode($text);

            // Удаляем все html теги кроме нужных нам в разметке
            $text =  strip_tags($text, '<p><a><b><i><s><h1><h2><h3><h4><blockquote><ul><li><ol><li><img><figure>');


            // ПЕРЕМЕННАЯ превью картинки. Первое изображение в статье, размеченное этим элементом, отображается на карточке в ленте Дзена
            // $image_first = '<figure><img src="https://seolik.ru' . $image . '"></figure>';
            $image_first = 'https://e-con-gusto.ru/' . $post->thumbnail;

            // добавляем элементы item rss для Дзен https://yandex.ru/support/zen/publishers/rss-modify.html#publication
            $all_item = '
            <item>
                <title>' . $title . '</title>
                <link>https://e-con-gusto.ru/recept/' . $post->slug . '</link>
                <pdalink>https://e-con-gusto.ru/recept/' . $id . '</pdalink>
                <media:rating scheme="urn:simple">nonadult</media:rating>
                <pubDate>' . $data_dob . '</pubDate>
                <author>e-con-gusto.ru</author>
                <category>' . $post->category->title . '</category>
                <enclosure url="https://e-con-gusto.ru' . $image . '" type="image/jpeg"/>
                ' . '
                <description>
                    <![CDATA[
            ' . $image_first . '
            ' . $des . '
                    ]]>
                </description>
                <content:encoded>
                    <![CDATA[
                   '  . $post->title . '<br>' . '<h1>' . $post->title . '</h1>' . $post->description . '<br>' . '<figure><img alt="' . $post->title . '"
                   src="' . 'https://e-con-gusto.ru/' . $image . '"></figure>' . '<br>' . $text . '
                   <p class="article-render__block article-render__block_unstyled" data-points="5"><span>Этот и другие рецепты вы найдете на моём сайте </span><a class="article-link article-link_theme_undefined article-link_color_default" rel="noopener nofollow" target="_blank" href="https://e-con-gusto.ru/"><b>ConGusto</b></a><span><b> и в телеграмм канале </b></span><a class="article-link article-link_theme_undefined article-link_color_default" rel="noopener nofollow" target="_blank" href="https://t.me/econgusto"><b>ConGusto</b></a><span><b>, </b></span><span>где я собираю только проверенные и классические рецепты по ресторанным технологиям.</span></p>
                    ]]>
                </content:encoded>
            </item>';

            array_push($newposts, $post['feed'] = $all_item);
        }


        return view('feed', compact('posts', 'newposts'));
    }
}
