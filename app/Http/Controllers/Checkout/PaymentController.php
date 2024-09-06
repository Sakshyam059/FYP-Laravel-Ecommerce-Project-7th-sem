<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\BillingDetail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentTransaction;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class PaymentController extends Controller
{
    private $user;
    private $cart;
    private $order_amount, $ref_id;
    private $payment_url,$payment_status;
    public function __construct()
    {
        $this->user = Auth::user();
        $this->cart = $this->user->cart;
        $this->order_amount = $this->cart->subtotal;

        Session::put('order',  [
            'user_id' => $this->user->id,
            'subtotal' => $this->order_amount
        ]);
    }
    public function index()
    {
        return view('frontend.checkout.payment-info');
    }
    public function updateInventory()
    {
        try{
            $orderdata = Order::create([
                'user_id' => $this->user->id,
                'subtotal' => $this->cart->subtotal,
                'payment_status' => $this->payment_status,
                'ref_id' => $this->ref_id,
            ]);   
            PaymentTransaction::create([
                'order_id'=> $orderdata['id'],
                'amount'=> $this->cart['subtotal'],
                'status'=> $this->payment_status,
                'payment_method'=> session()->get('payment_method')
            ]);

            foreach ($this->cart->cartItems()->get() as $item) {
                $quantity = $item->quantity;
                $default_sku = $item->product->product_skus->first();
                $size = $item->size_id ?? $default_sku->size_id;
                $color = $item->color_id ?? $default_sku->color_id;
                $inventory = $item->product->product_skus()->where('product_id', $item->product->id)->where('color_id', $color)->where('size_id', $size)->first();
                $detail = [
                    'order_id' => $orderdata->id,
                    'product_id' => $item['product_id'],
                    'size_id' => $size,
                    'color_id' => $color,
                    'quantity' => $item['quantity']
                ];
                OrderDetail::create($detail);
                $inventory->quantity -= $quantity;
                $inventory->save();
            }
            $shipping_detail = Session::get('shipping_detail');
            $shipping_detail['order_id'] = $orderdata['id'];
            Shipping::create($shipping_detail);
            $billing_information = Session::get('billing_information');
            $billing_information['user_id'] = $this->user->id;
            $billing_information['order_id'] = $orderdata['id'];
            BillingDetail::create($billing_information);
    
            $cart = Cart::where('user_id', $this->user->id)->first();
            $cart->delete();
        }catch(\Exception $e){
            dd($e->getMessage());
        }
        // $product=Product::find($item['product_id']);
        // $product->stock=$product['stock']-1;
        // $product->update();
    }
    public function cashPayment()
    {
        $this->ref_id = Str::uuid();
        $this->payment_status = 0;
        $this->updateInventory();
    }

    public function initiateKhaltiPayment()
    {
        $return_url = "http://127.0.0.1:8000/payment/verify";
        $khalti = 'https://a.khalti.com/api/v2/';
        $data = ([
            "return_url" => $return_url,
            "website_url" => "https://example.com/",
            "amount" => $this->order_amount * 100,
            "purchase_order_id" => 11,
            "purchase_order_name" => "test",
        ]);

        $response = Http::withHeaders([
            'Authorization' => env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->post($khalti . "epayment/initiate/", $data);

        foreach ($this->cart->cartItems()->get() as $item) {
            $order_detail['ref_id'] = $response['pidx'];
            $order_detail['product_id'] = $item->product_id;
            $order_detail['quantity'] = $item->quantity;
            Session::push('order_details', $order_detail);
        }
        $this->payment_url = $response['payment_url'];
    }
    public function verifyKhaltiPayment(Request $request)
    {
       
        $khalti = 'https://a.khalti.com/api/v2/';
        $data = ([
            "pidx" => $request->pidx,
        ]);
        $response = Http::withHeaders([
            'Authorization' => env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->post($khalti . "epayment/lookup/", $data);

        if ($response['status'] === "Completed") {
            $this->ref_id = $response['pidx'];
            $this->payment_status = 1;

            $this->updateInventory();

            return to_route('checkout.complete');
        }
    }

    public function initiatePayment(Request $request)
    {
        Session::put('payment_method', $request->payment_method);
        $payment_method=$request->payment_method;
        if ($payment_method === 'cash') {
            $this->cashPayment();
        } elseif ($payment_method === 'khalti') {
            $this->initiateKhaltiPayment();
            return Redirect::to($this->payment_url);
        } else {
            $this->cashPayment();
        }
       

        return to_route('checkout.complete')->with('message', 'Order Successful');
    }
}
