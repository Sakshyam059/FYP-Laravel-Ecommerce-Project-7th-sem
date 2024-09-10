<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorIdDetail;
use App\Models\VendorPayementGatewaySetting;
use App\Models\VendorPaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendorVerificationController extends Controller
{
    public function verify(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'description' => 'required',
                'address' => 'required',
                'district' => 'required',
                'state' => 'required',
                'account_type' => 'required',
                'id_card_front' => 'required',
                'id_card_back' => 'required',
                'id_name' => 'required',
                'id_number' => 'required',
                'payment_methods' => 'required',
                'esewa_api_key' => 'nullable',
                'khalti_api_key' => 'nullable',
            ]);
            $user_id = Auth::id();
            $user = User::find($user_id);
            $vendor = Vendor::where('user_id', $user_id)->first();
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            $vendor->update([
                'description' => $request->description,
                'address' => $request->address,
                'district' => $request->district,
                'state' => $request->state
            ]);

            $vendor_id_detail = [
                'vendor_id' => $vendor->id,
                'account_type' => $request->account_type,
                'id_name' => $request->id_name,
                'id_number' => $request->id_number,
            ];
            if ($request->hasFile('id_card_front')) {
                $file = $request->file('id_card_front');
                $name = $file->getClientOriginalName();
                $imagepath = time() . '_' . $name;
                $file->move(public_path('asset/images/vendor/card/'), $imagepath);
                $vendor_id_detail['ID_Card_Front'] = $imagepath;
            }
            if ($request->hasFile('id_card_back')) {
                $file = $request->file('id_card_back');
                $name = $file->getClientOriginalName();
                $imagepath = time() . '_' . $name;
                $file->move(public_path('asset/images/vendor/card/'), $imagepath);
                $vendor_id_detail['ID_Card_Back'] = $imagepath;
            }
            VendorIdDetail::updateOrCreate(
                [
                    'vendor_id' => $vendor->id
                ],
                $vendor_id_detail
            );
            foreach ($request->payment_methods as $key => $method) {
                if (array_key_exists("checked",$method)){
                    $mode = VendorPaymentMethod::updateOrCreate([
                        'vendor_id' => $vendor->id,
                        'payment_method_id' => $key,
                    ], [
                        'vendor_id' => $vendor->id,
                        'payment_method_id' => $key
                    ]);
                    if ($key !== 1) {
                        if ( $method['key'] !== null) {
                            VendorPayementGatewaySetting::updateOrCreate([
                                'vendor_payment_mode_id' => $mode['id']
                            ], [
                                'vendor_payment_mode_id' => $mode['id'],
                                'APIkey' => $method['key'],
                            ]);
                        }else{
                            throw new \Exception("Api Key is null");
                        }
                    }
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
        return back();
    }
}
