<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        if ($request->has('categories')) {
            $categorySlugs = $request->input('categories');
            $query->whereHas('category', function ($query) use ($categorySlugs) {
                $query->whereIn('slug', $categorySlugs);
            });
        }
        if ($request->has('brands')) {
            $brands = $request->input('brands');
            $query->whereHas('brand', function ($query) use ($brands) {
                $query->whereIn('slug', $brands);
            });
        }
        if ($request->has('min_price')) {
            $min_price = $request->input('min_price')??0;
            $query->where('price', '>=', $min_price);
        }
        if ($request->has('max_price')) {
            $max_price = $request->input('max_price')??9999;
            $query->where('price', '<=', $max_price);
        }
        if ($request->has('sortBy')) {
            $sort = $request->input('sortBy');
            if ($sort == 1) {
                $query->latest();
            } elseif ($sort == 2) {
                $query->orderBy('discount_value', 'desc');
            }
        }
        $products = $query->get();
        return view('frontend.products.index', compact('products'));
    }
    public function show(Product $product)
    {
        return view('frontend.products.show-details', compact('product'));
    }
    public function categoryFilter(Request $request, $slug)
    {
        $category = Category::with('products')->where('slug', $slug)->first();
        $products = $category->products()->get();
        return view('frontend.products.index', compact('products'));
    }
}
