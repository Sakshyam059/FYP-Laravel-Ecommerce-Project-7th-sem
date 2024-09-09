<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ColorPostRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    
    public function store(ColorPostRequest $request)
    {
        try {
            $validator = $request->validated();
            $validator['slug'] = Str::slug($request->color_name);
            Color::create($validator);
            
            return response()->json(['status' => 200, 'success' => true, 'message' => 'Color Created successfully']);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return Redirect::back();
    }

    
}
