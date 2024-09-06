@extends('frontend.includes.main')
@section('content')
    <div class="grid grid-cols-3 p-6">
        <div class="overflow-hidden">
            <img src="{{ asset('frontend/assets/svg/auth-asset1.svg') }}" alt="Sample photo" class="object-cover mx-auto" />
        </div>
        <div class="w-2/3 col-span-2 mx-auto space-y-4">
            <div>
                <h3 class="text-2xl font-bold">Welcome to {{ $siteSetting->name ?? 'Khelretail' }}</h3>
                <p class="">Create an account</p>
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="grid grid-cols-2 gap-3">
                    <div data-mdb-input-init class="mb-3 space-y-2">
                        <label class="block font-semibold" for="form3Example1m">First name</label>
                        <input type="text" id="form3Example1m" class="block w-full rounded-md bg-gray-100/60 "
                            name="firstname" />
                    </div>
                    <div data-mdb-input-init class="mb-3 space-y-2">
                        <label class="block font-semibold" for="form3Example1n">Last name</label>
                        <input type="text" id="form3Example1n" class="block w-full rounded-md bg-gray-100/60 "
                            name="lastname" />
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">

                    <div data-mdb-input-init class="mb-3 space-y-2">
                        <label class="block font-semibold" for="form3Example8">Email</label>
                        <input type="text" id="form3Example8" class="block w-full rounded-md bg-gray-100/60"
                            name="email" />
                    </div>
                    <div data-mdb-input-init class="mb-3 space-y-2">
                        <label class="block font-semibold" for="form3Example8">Phone</label>
                        <input type="text" id="form3Example8" class="block w-full rounded-md bg-gray-100/60 "
                            name="phone" />
                    </div>
                </div>

                <div data-mdb-input-init class="mb-3 space-y-2">
                    <label class="block font-semibold" for="form3Example8">Address</label>
                    <input type="text" id="form3Example8" class="block w-full rounded-md bg-gray-100/60 "
                        name="address" />
                </div>


                <div data-mdb-input-init class="mb-3 space-y-2">
                    <label class="block font-semibold" for="form3Example8">Password</label>
                    <input type="password" id="form3Example8" class="block w-full rounded-md bg-gray-100/60"
                        name="password" />
                </div>
                <div data-mdb-input-init class="mb-3 space-y-2">
                    <label class="block font-semibold" for="form3Example8">Confirm Password</label>
                    <input type="password" id="form3Example8" class="block w-full rounded-md bg-gray-100/60 "
                        name="password_confirmation" />
                </div>

                <div class="mb-3 space-y-2">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                        I agree all statements in <a href="#!">terms and conditions.</a>
                    </label>
                </div>

                <div>
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                        class="block w-full py-2 text-white bg-blue-800 rounded-md">Sign Up</button>
                   
                </div>
            </form>
            <div>
                <h6 class="inline">Have an account ?</h6>
               <a href="{{route('login')}}" class="font-medium text-blue-600">Log In</a>
            </div>

        </div>

    </div>
@endsection
