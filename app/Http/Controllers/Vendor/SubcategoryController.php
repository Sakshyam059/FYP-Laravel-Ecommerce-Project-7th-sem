<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;


class SubcategoryController extends Controller
{
    public function show($category)
    {
        $subcategories = SubCategory::where('category_id', $category)->get();
        return response()->json($subcategories);
    }
}