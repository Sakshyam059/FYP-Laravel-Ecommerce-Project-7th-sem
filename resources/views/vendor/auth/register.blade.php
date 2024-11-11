@extends('frontend.includes.main')

@section('content')
    <div class="p-6 mt-0 md:mt-6">
        <!-- Form Container -->
        <div class="w-full max-w-3xl p-6 mx-auto bg-white border rounded-lg shadow-md">
            <!-- Header -->
            <div class="py-4 text-center">
                <h3 class="text-2xl font-medium">Welcome to {{ $siteSetting->name ?? 'Khelretail' }}</h3>
                <p class="text-lg">Create a seller account</p>
            </div>

            <!-- Registration Form -->
            <form action="{{ route('vendor.auth.register') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                @csrf

                <!-- Company Name -->
                <div class="space-y-2">
                    <label class="block font-semibold" for="name">Company name <small class="text-red-600">*</small></label>
                    <input type="text" id="name" class="block w-full rounded-md bg-gray-50" name="name" />
                    @error('name')
                        <span class="text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Company Email and Phone -->
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <div class="space-y-2">
                        <label class="block font-semibold" for="email">Company Email <small class="text-red-600">*</small></label>
                        <input type="text" id="email" class="block w-full rounded-md bg-gray-50" name="email" />
                        @error('email')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="block font-semibold" for="phone">Company Phone <small class="text-red-600">*</small></label>
                        <input type="text" id="phone" class="block w-full rounded-md bg-gray-50" name="phone" minlength="10" maxlength="14" />
                        @error('phone')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Password and Confirm Password -->
                <div class="space-y-2">
                    <label class="block font-semibold" for="password">Password <small class="text-red-600">*</small></label>
                    <input type="password" id="password" class="block w-full rounded-md bg-gray-50" name="password" />
                    @error('password')
                        <span class="text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label class="block font-semibold" for="password_confirmation">Confirm Password <small class="text-red-600">*</small></label>
                    <input type="password" id="password_confirmation" class="block w-full rounded-md bg-gray-50" name="password_confirmation" />
                    @error('password_confirmation')
                        <span class="text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Terms and Conditions Checkbox -->
                <div class="flex items-center gap-2">
                    <input class="rounded bg-gray-50" type="checkbox" id="terms" required />
                    <label class="block" for="terms">
                        I agree to all statements in <a href="#!" class="text-green-600">terms and conditions.</a> 
                    </label>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="block w-full py-2 text-white bg-green-600 rounded-md">Sign Up</button>
                </div>
            </form>

            <!-- Login Link -->
            <div class="mt-4 text-center">
                <h6 class="inline">Have an account?</h6>
                <a href="{{ route('login') }}" class="font-medium text-green-600">Log In</a>
            </div>
        </div>
    </div>
@endsection
