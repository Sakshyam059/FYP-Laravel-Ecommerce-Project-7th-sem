<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OtpController extends Controller
{
    public function showVerifyForm()
    {
        return view('auth.verify-otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|string',
        ]);
        $email=Session::get('email');
        $user=User::where('email',$email)->first();
        $otp = Otp::where('user_id', $user->id)
                  ->where('otp', $request->input('otp'))
                  ->where('expires_at', '>', Carbon::now())
                  ->first();

        if ($otp) {
            $user->update(['verified_at' => Carbon::now()]);
            $otp->delete();

            event(new Registered($user));
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success','Login Success');
        }

        return back()->withErrors(['otp' => 'Invalid OTP or OTP expired.'])->with('error','Otp Failed');

    }
    public function resetOtp(){
        $email=Session::get('email');
        $user=User::where('email',$email)->first();
        $otp = Str::random(6);
        Otp::updateOrCreate([
            'user_id'=>$user->id
        ],[
            'user_id' => $user->id,
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(10),
        ]);
        return back()->with('success','A new otp has been sent your email.');
    }
}
