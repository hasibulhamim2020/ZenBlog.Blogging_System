<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VisitorAuthController extends Controller
{
    public function signUpView(){
        return view('front-end.auth.sign-up-view');
    }
    public function signUp(Request $request){
        Visitor::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'password'=>Hash::make($request->password)
        ]);
        return back();
    }

    public function signInView(){
        return view('front-end.auth.sign-in-view');
    }

}
