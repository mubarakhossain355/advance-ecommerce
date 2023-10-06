<?php

namespace App\Http\Controllers;


class MyCommerceController extends Controller
{
    public function index(){
        return view('website.home.index');
    }

    public function category(){
        return view('website.category.index');
    }

    public function detail(){
        return view('website.detail.index');
    }
}
