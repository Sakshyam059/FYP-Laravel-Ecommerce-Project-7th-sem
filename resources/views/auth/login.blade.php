@extends('frontend.includes.main')

@section('content')
    <!-- Form Section -->
    <div class="p-6 mx-auto space-y-4 border rounded lg:w-2/3">
        <div>
            <h3 class="text-2xl font-bold">Welcome Back!</h3>
            <p class="">Sign In to your account.</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Email Field -->
            <div class="mb-3 space-y-2">
                <label class="block font-semibold" for="email">Email</label>
                <input type="text" id="email" class="block w-full rounded-md bg-gray-100/60"
                    value="{{ old('email') }}" name="email" />
                @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="space-y-2">
                <label class="block font-semibold" for="password">Password</label>
                <input type="password" id="password" class="block w-full rounded-md bg-gray-100/60" name="password" />
                @error('password')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="block w-full py-2 text-white bg-green-500 rounded-md">Log In</button>
            </div>
        </form>

        <!-- Sign Up Link -->
        <div>
            <h6 class="inline">Don't have an account?</h6>
            <a href="{{ route('register') }}" class="font-medium text-green-600">Sign Up</a>
        </div>
    </div>
@endsection
