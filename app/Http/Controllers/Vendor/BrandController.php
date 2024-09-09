<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\BrandPostRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
{
    
    public function store(BrandPostRequest $request)
    {
        try {
            $validator = $request->validated();
            $validator['slug'] = Str::slug($request->brand_name);
            Brand::create($validator);
            
            return response()->json(['status' => 200, 'success' => true, 'message' => 'Brand Created successfully']);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return Redirect::back();
    }

}
