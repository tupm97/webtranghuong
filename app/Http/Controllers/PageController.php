<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Banner;
class PageController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        $banners = Banner::all();
        return view('shop.products',compact('categories','products','banners'));
    }
    public function about(){
        return view('shop.info.about');
    }
    public function news(){
        return view('shop.info.news');
    }
    public function intro(){
        return view('shop.info.intro');
    }
}
