<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products=Product::get();
        return view('frontend.products.index',compact('products'));
    }
    public function show(Product $product){
        return view('frontend.products.show-details',compact('product'));
    }
    public function categoryFilter(Request $request, $slug){
        $category = Category::with('products')->where('slug', $slug)->first();
        $products=$category->products()->get();
        return view('frontend.products.index',compact('products'));
    }
}
