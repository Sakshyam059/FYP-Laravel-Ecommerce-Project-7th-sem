@extends('frontend.includes.main')

@section('content')
    <!-- Form Section -->
    <div class="p-6 mx-auto space-y-4 border rounded lg:w-2/3">
        <div>
            <h3 class="text-2xl font-bold">Welcome to {{ $siteSetting->name ?? 'Khelretail' }}</h3>
            <p>Create an account</p>
        </div>
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Full Name Field -->
            <div class="space-y-2">
                <label class="block font-semibold" for="name">Full name</label>
                <input type="text" id="name" class="block w-full rounded-md bg-gray-50" name="name" />
            </div>

            <!-- Email and Phone Fields -->
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                <div class="space-y-2">
                    <label class="block font-semibold" for="email">Email</label>
                    <input type="text" id="email" class="block w-full rounded-md bg-gray-50" name="email" />
                </div>
                <div class="space-y-2">
                    <label class="block font-semibold" for="phone">Phone</label>
                    <input type="text" id="phone" class="block w-full rounded-md bg-gray-50" name="phone" />
                </div>
            </div>

            <!-- Password and Confirm Password Fields -->
            <div class="space-y-2">
                <label class="block font-semibold" for="password">Password</label>
                <input type="password" id="password" class="block w-full rounded-md bg-gray-50" name="password" />
            </div>
            <div class="space-y-2">
                <label class="block font-semibold" for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" class="block w-full rounded-md bg-gray-50"
                    name="password_confirmation" />
            </div>

            <!-- Terms and Conditions Checkbox -->
            <div class="flex items-center gap-2">
                <input class="block rounded" type="checkbox" id="terms" />
                <label class="block" for="terms">
                    I agree to all statements in <a href="#!" class="text-green-600">Terms and conditions.</a>
                </label>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="block w-full py-2 text-white bg-green-500 rounded-md">Sign Up</button>
            </div>
        </form>

        <!-- Log In Link -->
        <div>
            <h6 class="inline">Have an account?</h6>
            <a href="{{ route('login') }}" class="font-medium text-green-500">Log In</a>
        </div>
    </div>
@endsection
