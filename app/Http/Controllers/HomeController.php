<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Deal;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banners=Banner::get();
        $products=Product::get();
        $deals=Deal::all();
        return view('frontend.index',compact('banners','deals','products'));
    }
}
