@extends('frontend.includes.main')
@section('content')
    <div class="grid grid-cols-3 p-6">
        <div class="overflow-hidden">
            <img src="{{ asset('frontend/assets/svg/auth-asset1.svg') }}" alt="Sample photo" class="object-cover mx-auto"/>
        </div>
        <div class="w-2/3 col-span-2 mx-auto space-y-4">
            <div>
                <h3 class="text-2xl font-bold">Welcome Back!</h3>
                <p class="">Sign In to your account.</p>
            </div>
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div data-mdb-input-init class="mb-3 space-y-2">
                    <label class="block font-semibold" for="form3Example8">Email</label>
                    <input type="text" id="form3Example8" class="block w-full rounded-md bg-gray-100/60"
                        value="{{ old('email') }}" name="email" />
                </div>


                <div data-mdb-input-init class="space-y-2 ">
                    <label class="block font-semibold" for="form3Example8">Password</label>
                    <input type="password" id="form3Example8" class="block w-full rounded-md bg-gray-100/60" name="password" />
                </div>
                <div>
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                        class="block w-full py-2 text-white bg-blue-800 rounded-md">Log In</button>
                </div>
            </form>
            <div>
                <h6 class="inline">Don't have an account ?</h6>
               <a href="{{route('customer.register')}}" class="font-medium text-blue-600">Sign Up</a>
            </div>
        </div>
    </div>
@endsection
