<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function createShipping(Request $request)
    {
        $request->session()->put(
            'shipping_detail',
            [
                "address" => $request->address,
                "city" => $request->city,
                "zipcode" => $request->zipcode,
                "state" => $request->state,
                ]
            );
            return back();
    }
}
