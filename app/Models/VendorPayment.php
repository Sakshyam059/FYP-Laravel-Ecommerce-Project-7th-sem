<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorPayment extends Model
{
   protected $guarded=[];
   public function vendor(){
      return $this->belongsTo(Vendor::class);
   }
   public function order(){
      return $this->belongsTo(Order::class);
   }
}
