<?php

use Illuminate\Support\Facades\Route;
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
use App\Http\Controllers\UserController;
use App\Http\Controllers\Index\IndexController;


Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/article/{id}', [IndexController::class, 'show'])->name('single');

Route::get('/fast/{id}', [IndexController::class, 'fast'])->name('fast');

Route::get('/category', [IndexController::class, 'category'])->name('category');

Route::get('/category/{id}', [IndexController::class, 'category_item'])->name('category_item');

Route::get('/search', [IndexController::class, 'search'])->name('search');

Route::get('/about', [IndexController::class, 'about'])->name('about');


Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
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
});


Route::middleware(['guest'])->prefix('admin')->group(function () {
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});


Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');




