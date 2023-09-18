<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('front-end.home.home');
    }

    public function about(){
        return view('front-end.about.about');
    }

    public function category(){
        return view('front-end.category.category');
    }

    public function singlePost(){
        return view('front-end.single-post.single-post');
    }

    public function contact(){
        return view('front-end.contact.contact');
    }

    public function searchResult(){
        return view('front-end.search-result.search-result');
    }
}
