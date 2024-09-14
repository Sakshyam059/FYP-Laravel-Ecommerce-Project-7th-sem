<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Enums\UsertypeEnum;
use App\Enums\VerificationEnum;
use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\Otp;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('vendor.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone'=>['required','string','min:10','max:16']
        ]);

        $user = User::create([
            'name' => $request->name,
            'usertype' => UsertypeEnum::VENDOR->value,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'status' => VerificationEnum::UNVERIFIED->value,
        ]);
        Vendor::create([
            'user_id'=>$user['id']
        ]);

        $otp = Str::random(6);
        Otp::updateOrCreate([
            'user_id'=>$user->id
        ],[
            'user_id' => $user->id,
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(10),
        ]);
        // Send OTP via email
        Mail::to($request->email)->send(new OtpMail($otp,$request->name));
        Session::put('email',$request->email);
        return Redirect::route('otp.verify');
    }
}
