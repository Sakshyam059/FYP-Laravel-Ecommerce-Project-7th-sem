<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function isPurchased(User $user)
    {
        $orderDetails = OrderDetail::whereHas('order', function ($query) use ($user) {
            $query->where('user_id', $user->id)->where('is_completed',1);
        })->where('product_id', $this->product->id)->first();

        if ($orderDetails) {
            return true;
        }

        return false;
    }
}
