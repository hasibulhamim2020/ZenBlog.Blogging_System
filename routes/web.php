<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/category',[HomeController::class,'category'])->name('category');
Route::get('/single/post',[HomeController::class,'singlePost'])->name('single-post');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/search/result',[HomeController::class,'searchResult'])->name('search-result');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
