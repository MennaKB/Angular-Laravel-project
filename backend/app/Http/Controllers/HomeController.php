<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    // public function redirect(){
    //     $usertype = Auth::user()->usertype;
    // }

    public function index(){
        return view('home.userpage');
    }

    public function redirect(){
        return view('admin.home');
    }
}
