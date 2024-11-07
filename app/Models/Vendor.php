<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function id_detail(){
        return $this->hasOne(VendorIdDetail::class);
    }
    public function vendor_payment_modes(){
        return $this->hasMany(VendorPaymentMethod::class);
    }
    public function vendor_payments(){
        return $this->hasMany(VendorPayment::class);
     }
     public function totalPaymentsForCompletedOrders()
    {
        return $this->vendor_payments()
            ->whereHas('order', function ($query) {
                $query->where('is_completed', 1);
            })
            ->sum('remaining_amount');
    }
    public function vendor_khalti_payment_setting(){
        return $this->hasOne(VendorPayementGatewaySetting::class)->where('vendor_payment_mode_id',1)->first();
     }
}
