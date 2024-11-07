<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class VendorPaymentController extends Controller
{
    protected $vendor;
    public function index(Vendor $vendor){
        return view('admin.vendor.payment.index',compact('vendor'));
    }
    public function pay(Vendor $vendor){
        $return_url = route('admin.vendor.pay.verify',$vendor->id);
        $khalti = 'https://a.khalti.com/api/v2/';
        $data = ([
            "return_url" => $return_url,
            "website_url" => "https://example.com/",
            "amount" => $vendor->vendor_payments()->sum('remaining_amount') * 100,
            "purchase_order_id" => 11,
            "purchase_order_name" => "test",
        ]);
        $response = Http::withHeaders([
            'Authorization' => Crypt::decrypt($vendor->vendor_khalti_payment_setting()->APIkey),
            'Content-Type' => 'application/json',
        ])->post($khalti . "epayment/initiate/", $data);
        return Redirect::to($response['payment_url']);

    }
    public function verify(Request $request,Vendor $vendor)
    {
       
        $khalti = 'https://a.khalti.com/api/v2/';
        $data = ([
            "pidx" => $request->pidx,
        ]);
        $response = Http::withHeaders([
            'Authorization' => Crypt::decrypt($vendor->vendor_khalti_payment_setting()->APIkey),
            'Content-Type' => 'application/json',
        ])->post($khalti . "epayment/lookup/", $data);

        if ($response['status'] === "Completed") {
           $vendor->vendor_payments()->delete();
        }
        return to_route('admin.vendor.index');
    }
}
