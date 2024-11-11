@extends('frontend.includes.main')
@section('content')
    <style>
        input[type='radio']:checked+label.checkbox {
            border-color: #FFBF00;
        }
    </style>
    <section class="px-6">
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
        <div class="grid grid-cols-3 gap-3 my-4 ">
            <div class="p-4 border rounded ">
                @include('frontend.cart.partials.summary')
            </div>

            <form action="{{route('payment.initiate')}}" method="POST" class="col-span-2 p-4 space-y-4 border rounded">
                @csrf
                <div class="space-y-2">
                    <h2 class="text-xl font-medium">Payment Method</h2>
                    <p class="font-medium text-gray-500">Select a payment method</p>
                </div>
                
                <div class="grid grid-cols-3 gap-6 py-2">
                    {{-- <div >
                        <input value="cash" id="cash" type="radio" name="payment_method"  class="hidden">
                        <label for="cash" class="flex items-center w-full gap-4 p-6 border-2 rounded checkbox" >
                            <img class="h-2016g-blue-400" src="{{ asset('frontend/assets/static/images/payment-methods/cash-on-delivery.png') }}" 
                            alt="">
                            <span class="text-xl font-medium">Cash on Delivery</span>
                        </label>
                    </div> --}}
                    {{-- <div >
                        <input value="esewa" id="esewa" type="radio" name="payment_method"  class="hidden">
                        <label for="esewa" class="block w-full p-6 border-2 rounded checkbox" >
                            <img class="h-16" src="{{ asset('frontend/assets/static/images/payment-methods/esewa.png') }}" 
                                alt="">
                        </label>
                    </div> --}}
                    <div >
                        <input value="khalti" id="khalti" type="radio" name="payment_method" class="hidden" required>
                        <label for="khalti" class="block w-full p-6 border-2 rounded checkbox" >
                            <img class="h-16" src="https://imgs.search.brave.com/uFGwa8aM5mZkzVDHsfpqgZ6ZPQ7R0NP007egTQ-Klfw/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pY29u/YXBlLmNvbS93cC1j/b250ZW50L3BuZ19s/b2dvX3ZlY3Rvci9r/aGFsdGktbG9nby5w/bmc"
                                 alt="">
                        </label>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <button type="submit" 
                        class="flex items-center justify-center w-full py-2 text-white bg-green-600 rounded">NPR {{$mycart->subtotal}}</button>
                    <a href="{{ route('checkout.billing') }}"
                        class="flex items-center justify-center w-full py-2 bg-gray-100 rounded ">Back</a>
                </div>
            </form>
        </div>
    </section>
@endsection
