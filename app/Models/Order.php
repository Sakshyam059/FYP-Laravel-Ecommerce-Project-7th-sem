<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function orderItems(){
        return $this->hasMany(OrderDetail::class);
    }
    public function transactions(){
        return $this->hasMany(PaymentTransaction::class);
    }
}
