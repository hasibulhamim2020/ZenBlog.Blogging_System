<?php
///
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VisitorAuthController;
///
///
/////////////Front End Route start /////////////////
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/category',[HomeController::class,'category'])->name('category');
Route::get('/single/post',[HomeController::class,'singlePost'])->name('single-post');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/search/result',[HomeController::class,'searchResult'])->name('search-result');
///clint registration route /////
Route::get('/sign/up',[VisitorAuthController::class,'signUpView'])->name('sign-up');
Route::post('/visitor/sign/up/store',[VisitorAuthController::class,'signUp'])->name('signup.store');
Route::get('/sign/in',[VisitorAuthController::class,'signInView'])->name('sign-in');

Route::get('/blog/details/{slug}',[HomeController::class,'blogDetails'])->name('blog.details');
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
