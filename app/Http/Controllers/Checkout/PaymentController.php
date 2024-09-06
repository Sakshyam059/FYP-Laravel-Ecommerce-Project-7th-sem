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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class PaymentController extends Controller
{
    private $user;
    private $cart;
    private $order_amount;
    private $ref_id,$payment_url;
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
    public function cashPayment()
    {
        $orderdata = Order::create([
            'user_id' => $this->user->id,
            'subtotal' => $this->cart->subtotal,
            'ref_id' => Str::uuid()
        ]);
        $payment['order_id'] = $orderdata['id'];
        $payment['amount'] = $this->cart['subtotal'];
        $payment['payment_method'] = Session::get('payment_method');
        PaymentTransaction::create($payment);
        

        $shipping_detail = Session::get('shipping_detail');
        $shipping_detail['order_id'] = $orderdata['id'];
        Shipping::create($shipping_detail);
        $billing_information = Session::get('billing_information');
        $billing_information['order_id'] = $orderdata['id'];
        BillingDetail::create($billing_information);


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
            'user_id' => 'integer',
            'product_id' => 'nullable',
            'payment_status' => 'nullable',
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
            $this->payment_url=$response['payment_url'];
    }
    public function verifyKhaltiPayment(Request $request)
    {
        $user = $this->user;
        $cart = $user->cart;
        $khalti = 'https://a.khalti.com/api/v2/';
        $data = ([
            "pidx" => $request->pidx,
        ]);
        $response = Http::withHeaders([
            'Authorization' => env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->post($khalti . "epayment/lookup/", $data);
        DB::beginTransaction();
        try {
            if ($response['status'] === "Completed") {
                $order = Session::get('order');
                $orderdata = Order::create([
                    'user_id' => $user->id,
                    'subtotal' => $order['subtotal'],
                    'payment_status' => 1,
                    'ref_id' => $response['pidx'],
                ]);

                $payment['order_id'] = $orderdata['id'];
                $payment['amount'] = $cart['subtotal'];
                $payment['status'] = 1;
                $payment['payment_method'] = Session::get('payment_method');
                // $payment['request_date'] = Carbon::now();
                PaymentTransaction::create($payment);
                $order_details = Session::get('order_details');
                foreach ($this->cart->cartItems()->get() as $item) {
                    $quantity=$item->quantity;
                    $default_sku= $item->product->product_skus->first();
                    $size=$item->size_id??$default_sku->size_id;
                    $color=$item->color_id??$default_sku->color_id;
                    $inventory=$item->product->product_skus()->where('product_id',$item->product->id)->where('color_id',$color)->where('size_id',$size)->first();
                    $detail = [
                        'order_id' => $orderdata->id,
                        'product_id' => $item['product_id'],
                        'size_id' => $size,
                        'color_id' => $color,
                        'quantity' => $item['quantity']
                    ];
                    OrderDetail::create($detail);
                    $inventory->quantity-=$quantity;
                    $inventory->save();
                }
                $shipping_detail = Session::get('shipping_detail');
                $shipping_detail['order_id'] = $orderdata['id'];
                Shipping::create($shipping_detail);
                $billing_information = Session::get('billing_information');
                $billing_information['user_id'] = $this->user->id;
                $billing_information['order_id'] = $orderdata['id'];
                BillingDetail::create($billing_information);

                // $product=Product::find($item['product_id']);
                // $product->stock=$product['stock']-1;
                // $product->update();

                DB::commit();

                return to_route('checkout.complete', ['order_id' => $orderdata->id]);
            }
        } catch (\Exception $e) {
            DB::rollback();

            dd($e->getMessage());
        }
    }
    
    public function initiatePayment(Request $request)
    {
        $payment_method = $request->payment_method;
        Session::put('payment_method', $request->payment_method);
        if ($payment_method === 'cash') {
            $this->cashPayment();
        }elseif($payment_method==='khalti'){
            $this->initiateKhaltiPayment();
            
            return Redirect::to($this->payment_url);
        }else{
            $this->cashPayment();

        }
        $cart = Cart::where('user_id', $this->user->id)->first();
        $cart->delete();

        return to_route('checkout.complete')->with('message', 'Order Successful');
    }
}
