<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        session()->forget('order');

        $orders = Order::where('user_id', Auth::id())->orderBy('is_completed', 'asc')->get();
        // dd($orders);
        return view('frontend.account.order.index', compact('orders'));
    }
    public function orderDelivery(OrderDetail $detail)
    {
        return view('frontend.account.order.update-delivery', compact('detail'));
    }
    public function updateDelivery(Request $request, OrderDetail $detail)
    {
        $request->validate([
            'otp' => 'required|min:6|max:6'
        ]);
  
        if ($detail->otp == $request->input('otp')) {
            $detail->update([
                'delivery_status' => 1
            ]);
            $order = $detail->order;
            $order->updateCompletionStatus();
            foreach($order->shippings->where('product_id',$detail->product_id) as $shipping){
                $shipping->update([
                    'status'=>1
                ]);
            }
        }
        return redirect()->route('order.index')->with('success','Thank you for ordering..');
    }
}
