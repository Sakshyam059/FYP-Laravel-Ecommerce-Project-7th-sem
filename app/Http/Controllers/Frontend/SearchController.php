<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('items.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $items = Product::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('name', 'like', "%{$query}%"); // Adjust field as needed
        })->get();

        return response()->json($items);
    }
}
