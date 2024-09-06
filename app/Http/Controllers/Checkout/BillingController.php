<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\BillingDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BillingController extends Controller
{
     public function index(){
        return view('frontend.checkout.billing-info');
    }
    public function create(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'add_note' => 'nullable',
        ]);
        $request->session()->put(
            'billing_information',
            [
                "user_id"=>$request->user()->id,
                "address" => $request->address,
                "city" => $request->city,
                "zipcode" => $request->zipcode,
                "state" => $request->state,
                "add_note" => $request->add_note,
            ]
        );
        return Redirect::route('checkout.payment');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'add_note' => 'nullable',
        ]);
        BillingDetail::create($data);
    }
}
