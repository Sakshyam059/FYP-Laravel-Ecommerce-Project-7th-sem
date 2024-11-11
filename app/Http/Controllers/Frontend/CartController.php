<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToCartPostRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = request()->user();
        return view('frontend.cart.index', compact('user'));
    }
    public function addToCart(AddToCartPostRequest $request)
    {
        try {
            $request->validated();
            $user_id = Auth::user()->id;
            $cart = Cart::where('user_id', $user_id)->first();
            $product = Product::find($request->product_id);
            $quantity=$request->quantity??1;
            if($cart===null){
                    $data=Cart::create([
                        'user_id' => $user_id,
                        'subtotal' => $quantity*($product->price-($product->price*$product->discount_value/100))
                    ]);
                    CartItem::create([
                        'cart_id'=>$data['id'],
                        'product_id'=>$request->product_id,
                        'color_id'=>$request->color,
                        'size_id'=>$request->size,
                        'quantity'=>$request->quantity??1
                    ]);   
            }else{
                $item=CartItem::where('cart_id',$cart['id'])->where('product_id',$request->product_id)->exists();
                if($item){
                    throw new \Exception("Already in cart");
                }else{                  
                    CartItem::create([
                        'cart_id'=>$cart['id'],
                        'product_id'=>$request->product_id,
                        'color_id'=>$request->color,
                        'size_id'=>$request->size,
                        'quantity'=>$request->quantity??1
                    ]);   
                    $cart['subtotal']+=$product->price-($product->price*$product->discount_value/100);
                    $cart->save();
                }              
            }
            return back()->with('success','Product has been added to cart');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function removeFromCart(CartItem $item){
        $cart=Cart::find($item->cart_id);
        $price=$item->product->discount_price();
        try{
            $cart['subtotal']=$cart['subtotal']-$price;
            $cart->update();
            $item->delete();
            return back()->with('success','Product has been removed from cart');
        }catch(\Exception $e){
            return back()->with('error','Some error occured');
        }
    }
}
