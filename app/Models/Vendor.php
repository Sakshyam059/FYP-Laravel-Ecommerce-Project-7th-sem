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
}
