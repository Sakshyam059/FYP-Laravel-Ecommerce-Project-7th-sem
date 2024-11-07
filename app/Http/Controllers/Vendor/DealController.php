<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDeal;
use Illuminate\Http\Request;

class DealController extends Controller
{
    public function createProductDeal(Product $product){
        return view('vendor.deals.create',compact('product'));
    }
    public function addProductDeal(Request $request,Product $product){
  
        $product_deal=$request->validate([
            'deal_id'=>'required',
        ]);
        $product_deal['product_id']=$product->id;
        ProductDeal::updateOrCreate([
            'product_id'=>$product->id
        ],$product_deal);
        return to_route('vendor.product.index')->with('success','Deal has been created');
    }
}
