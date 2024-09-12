<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function vendor(){
        return $this->belongsTo(Vendor::class,'vendor_id','id');
    }

    public function discount_price(){
        return $this->price-($this->price*($this->discount_value/100));
    }
    public function product_skus(){
        return $this->hasMany(ProductSku::class);
    }
    public function allImage(){
        return $this->hasMany(ProductImage::class);
    }
    public function mainImage(){
        return $this->hasOne(ProductImage::class)->where('is_main',1);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function productDeal(){
        return $this->hasOne(ProductDeal::class);
    }
   
}
