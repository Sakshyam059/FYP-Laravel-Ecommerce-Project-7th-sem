<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('vendor.profile.verify', [
            'user' => $request->user(),
        ]);
    }
}