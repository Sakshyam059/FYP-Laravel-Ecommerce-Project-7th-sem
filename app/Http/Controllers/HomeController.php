<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banners=Banner::get();
        $products=Product::get();
        return view('frontend.index',compact('banners','products'));
    }
}
