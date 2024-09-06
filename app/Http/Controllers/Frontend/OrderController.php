<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        session()->forget('order');

        $orders=Order::where('user_id',Auth::id())->get();
        // dd($orders);
        return view('frontend.account.order.index',compact('orders'));
    }
}
