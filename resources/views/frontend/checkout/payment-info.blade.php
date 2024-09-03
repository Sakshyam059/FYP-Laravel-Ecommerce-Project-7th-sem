@extends('frontend.includes.main')
@section('content')
    <style>
        .same-line input[type='radio'] {
            display: none;
        }

        .same-line label.checkbox {
            display: inline-block;
            font-size: 12.2pt;
        }

        .same-line input[type='radio']:checked+label.checkbox {
            border: 2px solid #FFBF00;
        }
    </style>
    <section class="px-6">
        <div class="flex items-center justify-between">
            <h4 class="w-full text-3xl font-medium">Checkout</h4>
            <ul class="flex items-center justify-between w-full px-3 pb-3 overflow-hidden ">
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



            </ul>
        </div>
        <div class="flex justify-between gap-3 my-4 ">
            <div class="p-0 card col ">
                <div class="bg-white border-0 card-header">
                    <h5 class="py-2 card-title">Payment Method</h5>
                </div>
                <div class="pt-0 card-body">
                    <div class="">
                        <label for="" class="pb-3 form-label">Select a payment method</label>
                        <div class=" same-line">
                            <input type="radio" name="aa" id="cb1" value="Sí" class="checkbox">
                            <label class="p-4 rounded w-100 checkbox bg-light" for="cb1">
                                <img src="{{ asset('frontend/assets/images/payment-methods/esewa.png') }}" width="120px"
                                    height="44px" alt="">
                            </label>
                        </div>
                        <div class="mt-3 same-line">
                            <input type="radio" name="aa" id="cb2" value="Sí" class="checkbox">
                            <label class="p-4 rounded w-100 checkbox bg-light" for="cb2">
                                <img src="https://imgs.search.brave.com/uFGwa8aM5mZkzVDHsfpqgZ6ZPQ7R0NP007egTQ-Klfw/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pY29u/YXBlLmNvbS93cC1j/b250ZW50L3BuZ19s/b2dvX3ZlY3Rvci9r/aGFsdGktbG9nby5w/bmc"
                                    width="120px" height="44px" alt="">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                @include('frontend.cart.partials.summary')
                <div class="mt-4 border-0 card">
                    <a href="{{ route('checkout.complete') }}" class="btn btn-primary">Pay $100</a>
                    <a href="{{ route('checkout.billing') }}" class="mt-2 btn btn-outline-secondary">Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection
