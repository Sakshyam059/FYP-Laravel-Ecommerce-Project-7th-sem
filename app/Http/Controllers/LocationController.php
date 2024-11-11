<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getDistricts($province_id)
    {
        $districts = District::where('province_id', $province_id)->get();

        return response()->json($districts);
    }
}
