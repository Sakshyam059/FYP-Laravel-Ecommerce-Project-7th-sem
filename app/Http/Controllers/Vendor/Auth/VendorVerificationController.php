<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Enums\VerificationEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorIdDetail;
use App\Models\VendorPayementGatewaySetting;
use App\Models\VendorPaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class VendorVerificationController extends Controller
{
    public function verify(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'nullable',
                'email' => 'nullable',
                'description' => 'nullable',
                'logo' => 'nullable|image|mimes:png,jpg',
                'address' => 'nullable',
                'district' => 'nullable',
                'state' => 'nullable',
                'account_type' => 'nullable',
                'id_card_front' => 'nullable',
                'id_card_back' => 'nullable',
                'id_name' => 'nullable',
                'id_number' => 'nullable',
                'payment_methods' => 'nullable',
                'esewa_api_key' => 'nullable',
                'khalti_api_key' => 'nullable',
            ]);
            $user_id = Auth::id();
            $user = User::find($user_id);
            $vendor = Vendor::where('user_id', $user_id)->first();
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'status' => VerificationEnum::PENDING->value,
            ]);
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $name = $file->getClientOriginalName();
                $imagepath = time() . '_' . $name;
                File::delete(public_path('asset/images/vendor/logo/' . $vendor->logo));
                $file->move(public_path('asset/images/vendor/logo/'), $imagepath);
            }
            $vendor->update([
                'description' => $request->description,
                'address' => $request->address,
                'district_id' => $request->district,
                'province_id' => $request->state,
                'logo'=> $imagepath??$vendor->logo
            ]);

            $vendor_id_detail = [
                'vendor_id' => $vendor->id,
                'account_type' => $request->account_type??$vendor->id_detail->account_type,
                'id_name' => $request->id_name??$vendor->id_detail->id_name,
                'id_number' => $request->id_number??$vendor->id_detail->id_number,
            ];
            if ($request->hasFile('id_card_front')) {
                $file = $request->file('id_card_front');
                $name = $file->getClientOriginalName();
                $imagepath = time() . '_' . $name;
                File::delete(public_path('asset/images/vendor/card/' . $vendor->ID_Card_Front));
                $file->move(public_path('asset/images/vendor/card/'), $imagepath);
                $vendor_id_detail['ID_Card_Front'] = $imagepath??$vendor->ID_Card_Front;
            }
            if ($request->hasFile('id_card_back')) {
                $file = $request->file('id_card_back');
                $name = $file->getClientOriginalName();
                $imagepath = time() . '_' . $name;
                File::delete(public_path('asset/images/vendor/card/' . $vendor->ID_Card_Back));
                $file->move(public_path('asset/images/vendor/card/'), $imagepath);
                $vendor_id_detail['ID_Card_Back'] = $imagepath??$vendor->ID_Card_Back;
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
                    // if ($key !== 1) {
                        if ( $method['key'] !== null) {
                            VendorPayementGatewaySetting::updateOrCreate([
                                'vendor_id' => $vendor->id,
                                'vendor_payment_mode_id' => $mode['id'],
                            ], [
                                'vendor_id' => $vendor->id,
                                'vendor_payment_mode_id' => $mode['id'],
                                'APIkey' => Crypt::encrypt($method['key']),
                            ]);
                        }else{
                            throw new \Exception("Api Key is null");
                        }
                    // }
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
