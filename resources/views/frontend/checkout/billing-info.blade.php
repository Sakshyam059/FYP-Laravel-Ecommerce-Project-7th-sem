@extends('frontend.includes.main')
@section('content')
    <section class="px-6 space-y-4">
        <div class="flex items-center justify-between">
            <h4 class="w-full text-xl font-medium">Checkout</h4>
            {{-- <ul class="flex items-center justify-between w-full px-3 pb-3 overflow-hidden ">
                <li class="w-full">
                    <div class="relative flex items-center px-6">
                        <div class="relative flex flex-col items-center py-10">
                            <div class="z-10 flex items-center p-1 bg-green-600 border-0 rounded-full w-fit">
                                <i class='text-white bx bxs-circle'></i>
                            </div>
                            <h4 class="absolute bottom-0 text-lg font-medium text-gray-800">Billings</h4>
                        </div>
                        <div class="absolute w-full h-1 bg-green-400 billing"></div>
                    </div>
                </li>
                <li class="w-full ">
                    <div class="relative flex items-center px-6">
                        <div class="relative flex flex-col items-center py-10">
                            <div class="z-10 flex items-center p-1 bg-green-600 border-0 rounded-full w-fit">
                                <i class='text-white bx bxs-circle'></i>
                            </div>
                            <h4 class="absolute bottom-0 text-lg font-medium text-gray-800">Payment</h4>
                        </div>
                        <div class="absolute w-full h-1 bg-green-400 billing"></div>
                    </div>
                </li>
                <li class="">
                    <div class="relative flex items-center px-6">
                        <div class="relative flex flex-col items-center py-10">
                            <div class="z-10 flex items-center p-1 bg-green-600 border-0 rounded-full w-fit">
                                <i class='text-white bx bxs-circle'></i>
                            </div>
                            <h4 class="absolute bottom-0 text-lg font-medium text-gray-800">Complete</h4>
                        </div>
                    </div>
                </li>



            </ul> --}}
        </div>

        <div class="grid grid-cols-2 gap-4">
            @include('frontend.cart.partials.shipping-info')
            <div class="p-4 space-y-4 border rounded">
                <div class="">
                    <h2 class="text-xl font-medium">Billing Address</h2>
                </div>
                <form action="{{ route('billing.create') }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="space-y-2">
                        <label for="" class="block ">Full Name</label>
                        <input type="text" class="w-full border-gray-400 rounded bg-gray-50"
                            value="{{ auth()->user()->name }}" readonly>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="" class="block ">Email</label>
                            <input type="text" class="w-full border-gray-400 rounded bg-gray-50"
                                value="{{ auth()->user()->email }}" readonly>
                        </div>
                        <div class="space-y-2">
                            <label for="" class="block ">Phone</label>
                            <input type="text" class="w-full border-gray-400 rounded bg-gray-50"
                                value="{{ auth()->user()->phone }}" readonly>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="" class="block ">Address</label>
                            <input type="text" name="address"
                                value="{{ session()->get('billing_information')['city'] ?? old('city') }}"
                                class="w-full border-gray-400 rounded bg-gray-50">
                        </div>
                        <div class="space-y-2">
                            <label for="" class="block">City</label>
                            <input type="text" name="city"
                                value="{{ session()->get('billing_information')['city'] ?? old('city') }}"
                                class="w-full border-gray-400 rounded bg-gray-50">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="" class="block ">Zip Code</label>
                            <input type="number" minlength="6" maxlength="6" name="zipcode"
                                value="{{ session()->get('billing_information')['zipcode'] ?? old('zipcode') }}"
                                class="w-full border-gray-400 rounded bg-gray-50">
                        </div>
                        <div class="space-y-2">
                            <label for="" class="block ">State</label>
                            <select name="state" id="" class="w-full border-gray-400 rounded bg-gray-50">
                                <option selected disabled>Choose your state</option>
                                <option value="gandaki" {{(session()->get('billing_information')['state']??'')=='gandaki'?'selected':''}}>Gandaki</option>
                                <option value="bagmati" {{(session()->get('billing_information')['state']??'')=='bagmati'?'selected':''}}>Bagmati</option>
                                <option value="lumbini" {{(session()->get('billing_information')['state']??'')=='lumbini'?'selected':''}}>Lumbini</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="" class="block">Additional Notes</label>
                        <textarea class="w-full border-gray-400 rounded bg-gray-50" name="add_note" rows="4" id=""
                            cols="30">{{ session()->get('billing_information')['add_note'] ?? old('add_note') }}</textarea>
                    </div>
                    <div class="flex justify-between gap-6 ">
                        <a href="{{ route('cart.index') }}"
                            class="inline-flex items-center justify-center w-full py-2 bg-gray-100 border rounded">Return</a>
                        <button type="submit" class="w-full py-2 text-white bg-blue-600 border rounded">Confirm</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
