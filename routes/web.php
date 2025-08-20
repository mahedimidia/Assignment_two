<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('home.home');
});


Route::controller(HomeController::class)->group(function () {
    Route::prefix('home')->group(function () {
        Route::get('/', 'index')->name('home.index');
        Route::get('/about', 'about')->name('home.about');
        Route::get('/contact', 'contact')->name('home.contact');
        Route::get('/categories', 'categories')->name('home.categories');
        Route::get('/categoriesItem/{id}','categoriesItem')->name('home.categoriesItem');
        Route::get('/login','login')->name('home.login');
        Route::get('/registration','registration')->name('home.registration');
        Route::post('/user_login', 'user_login')->name('home.user_login');
    });
});

Route::get('admin',[AdminController::class,'index'])->name('admin.dashboard');

Route::resource('admin/categories', CategoriesController::class);
Route::resource('admin/post', PostController::class);

