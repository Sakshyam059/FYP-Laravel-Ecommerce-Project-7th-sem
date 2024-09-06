<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(){
        return view('frontend.page.about');
    }
    public function contact(){
        return view('frontend.page.contact');
    }
    public function privacyPolicy(){
        return view('frontend.page.privacy-policy');
    }
}
