<?php
///
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
///
///
/////////////Front End Route start /////////////////
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/category',[HomeController::class,'category'])->name('category');
Route::get('/single/post',[HomeController::class,'singlePost'])->name('single-post');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/search/result',[HomeController::class,'searchResult'])->name('search-result');
/////////////Front End Route end //////////////////////
///
///
///////////////////////////////////
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
/////////////Back End Route start ////////////////////
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resources(['categories'=>CategoryController::class]);
    Route::resources(['blogs'=>BlogController::class]);
/////////////Back End Route end //////////////////////
///
///
///
});
