<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorPaymentMethod extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function payment_mode(){
        return $this->belongsTo(PaymentMethod::class,'payment_method_id','id');
    }
}
