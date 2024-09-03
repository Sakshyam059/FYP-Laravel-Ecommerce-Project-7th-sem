<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        return view('frontend.checkout.billing-info');
    }
    public function paymentIndex(){
        return view('frontend.checkout.payment-info');
    }
    public function completeOrder(){
        return view('frontend.checkout.complete-order');
    }
}
