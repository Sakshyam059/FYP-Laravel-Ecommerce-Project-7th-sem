<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orderItems()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function transaction()
    {
        return $this->hasOne(PaymentTransaction::class);
    }
    public static function hasUserOrderedProduct($userId, $productId)
    {
        return self::where('user_id', $userId)
            ->where('is_completed', 1)
            ->whereHas('orderItems', function ($query) use ($productId) {
                $query->where('product_id', $productId);
            })
            ->exists();
    }
    public function updateCompletionStatus()
    {
        $allCompleted = $this->orderItems()->where('delivery_status', '!=', 1)->doesntExist();

        if ($allCompleted) {
            $this->is_completed = 1;
            $this->save();
        }
    }
    public function shippings(){
        return $this->hasMany(Shipping::class);
    }
}
