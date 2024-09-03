<?php
namespace App\View\Composers;

use App\Models\Cart;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class CartComposer
{
    private $mycart;
    public function compose(View $view)
    {
        if(Auth::user()){
            if (!$this->mycart) {
                $this->mycart = Cart::where('user_id',Auth::user()->id)->with('cartItems')->first();
            }
            return $view->with('mycart', $this->mycart);
        }
    }
}
