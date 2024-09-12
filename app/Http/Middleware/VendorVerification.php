<?php

namespace App\Http\Middleware;

use App\Enums\UsertypeEnum;
use App\Enums\VerificationEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VendorVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if ($user && $user->usertype === UsertypeEnum::VENDOR->value && $user->status!==VerificationEnum::VERIFIED->value) {
            return response()->view('vendor.profile.verify',compact('user'));
        }
        return $next($request);
    }
}
