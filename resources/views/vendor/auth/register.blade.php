@extends('frontend.includes.main')
@section('content')
    <div class="p-6 -mt-3 ">


        <div class="w-3/5 p-6 mx-auto space-y-4 bg-white border rounded">
            <div class="py-2 space-y-2 text-center">
                <h3 class="text-2xl font-medium ">Welcome to {{ $siteSetting->name ?? 'Khelretail' }}</h3>
                <p class="text-lg">Create a seller account</p>
            </div>
            <form action="{{ route('vendor.auth.register') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                @csrf
                <div class="space-y-2 ">
                    <label class="block " for="form3Example1m">Company name <small class="text-red-600">*</small></label>
                    <input type="text" id="form3Example1m" class="block w-full rounded-md bg-gray-50 " name="name" />
                    @error('name')
                        <span class="text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="space-y-2 ">
                        <label class="block " for="form3Example1m">Company Email <small
                                class="text-red-600">*</small></label>
                        <input type="text" id="form3Example1m" class="block w-full rounded-md bg-gray-50 "
                            name="email" />
                        @error('email')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="space-y-2 ">
                        <label class="block " for="form3Example1m">Company Phone <small
                                class="text-red-600">*</small></label>
                        <input type="text" id="form3Example1m" class="block w-full rounded-md bg-gray-50 "
                            name="phone" />
                            @error('phone')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                    </div>
                </div>


                <div class="space-y-2 ">
                    <label class="block " for="form3Example8">Password <small class="text-red-600">*</small></label>
                    <input type="password" class="block w-full rounded-md bg-gray-50" name="password" />
                    @error('password')
                        <span class="text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-2 ">
                    <label class="block " for="form3Example8">Confirm Password <small class="text-red-600">*</small></label>
                    <input type="password" class="block w-full rounded-md bg-gray-50 " name="password_confirmation" />
                    @error('password_confirmation')
                        <span class="text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center gap-2">
                    <input class="rounded bg-gray-50" type="checkbox" value="" id="form2Example3c" />
                    <label class="block" for="form2Example3">
                        I agree all statements in <a href="#!">terms and conditions.</a>
                        <small class="text-red-600">*</small></label>
                </div>

                <div>
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                        class="block w-full py-2 text-white bg-green-600 rounded-md">Sign Up</button>

                </div>
            </form>
            <div>
                <h6 class="inline">Have an account ?</h6>
                <a href="{{ route('login') }}" class="font-medium text-green-600">Log In</a>
            </div>

        </div>

    </div>
@endsection
