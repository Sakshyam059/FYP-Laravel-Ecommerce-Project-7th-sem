<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function completeOrder(Request $request){
        $order=$request->session()->get('order');
        $payment_method=$request->session()->get('payment_method');
        $shipping_detail=$request->session()->get('shipping_detail');
        $billing_information=$request->session()->get('billing_information');
        $request->session()->forget('order_details');
        $request->session()->forget('payment_method');
        return view('frontend.checkout.complete-order',compact('payment_method','billing_information','shipping_detail','order'));

    }
}
