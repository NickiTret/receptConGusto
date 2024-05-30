<?php

use Illuminate\Support\Facades\Route;

//admin control
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\FastController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\FeaturesController;
use App\Http\Controllers\Admin\HatController;
use App\Http\Controllers\Admin\SousController;
use App\Http\Controllers\Admin\SubcatController;
use App\Http\Controllers\Admin\MeatController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\PieceController;
use App\Http\Controllers\Admin\SteakController;
use App\Http\Controllers\AjaxControlle;
use App\Http\Controllers\AjaxController;
//front control
use App\Http\Controllers\UserController;
use App\Http\Controllers\Index\IndexController;

// users liked

use App\Http\Controllers\Personal\Liked\LikedController;
use App\Http\Controllers\Personal\Comment\CommentController;



Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/recept/{slug}', [IndexController::class, 'show'])->name('single');
Route::get('/fast/{slug}', [IndexController::class, 'fast'])->name('fast');
Route::get('/category', [IndexController::class, 'category'])->name('category');
Route::get('/tag/{id}', [IndexController::class, 'tag'])->name('tags.single');
Route::get('/category/{slug}', [IndexController::class, 'category_item'])->name('category_item');
Route::get('/search', [IndexController::class, 'search'])->name('search');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/news', [IndexController::class, 'news'])->name('news');
Route::get('/news/{slug}', [IndexController::class, 'new'])->name('new');
Route::get('/marinade', [IndexController::class, 'marinade'])->name('marinade');
Route::get('/dessert', [IndexController::class, 'dessert'])->name('dessert');
Route::get('/steak', [IndexController::class, 'steak'])->name('steak');



Route::get('/feed.xml', [IndexController::class, 'feed'])->name('feed');
Route::get('/feed_news.xml', [IndexController::class, 'feed_news'])->name('feed_news');

//json
Route::get('/json/{slug}', [IndexController::class, 'jsonShow'])->name('jsonShow');


Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::get('/cache', [AjaxController::class, 'delete'])->name('cache');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/posts', PostController::class);
    Route::resource('/heros', HeroController::class);
    Route::resource('/headers', HeaderController::class);
    Route::resource('/news', NewController::class);
    Route::resource('/fasts', FastController::class);
    Route::resource('/banners', BannerController::class);
    Route::resource('/features', FeaturesController::class);
    Route::resource('/hat', HatController::class);
    Route::resource('/souses', SousController::class);
    Route::resource('/subcats', SubcatController::class);
    Route::resource('/meats', MeatController::class);
    Route::resource('/seo', SeoController::class);
    Route::resource('/piece', PieceController::class);
    Route::resource('/steak', SteakController::class);
});


//user personal likes and like
Route::middleware(['auth'])->group(function () {
    Route::get('/liked', [LikedController::class, 'index'])->name('personal.liked');
    Route::delete('/liked/{post}', [LikedController::class, 'delete'])->name('personal.liked.delete');
    Route::post('/liked/{post}', [LikedController::class, 'addLiked'])->name('personal.liked.post');

    Route::post('/comment/{post}', [CommentController::class, 'addComment'])->name('personal.comment.add');

    Route::post('/comment/{comment}', [CommentController::class, 'addLike'])->name('personal.comment.addLike');
    Route::delete('/comment/{comment}', [CommentController::class, 'deleteComment'])->name('personal.comment.deleteComment');
});

//login, logout control
Route::middleware(['guest'])->prefix('admin')->group(function () {
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
