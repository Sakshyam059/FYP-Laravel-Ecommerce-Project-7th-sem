<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\SizePostRequest;
use App\Models\Size;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class SizeController extends Controller
{
    
    public function store(SizePostRequest $request)
    {
        try {
            $validator = $request->validated();
            $validator['slug'] = Str::slug($request->size_name);
           Size::create($validator);
            
            return response()->json(['status' => 200, 'success' => true, 'message' => 'Size Created successfully']);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return Redirect::back();
    }

   
}