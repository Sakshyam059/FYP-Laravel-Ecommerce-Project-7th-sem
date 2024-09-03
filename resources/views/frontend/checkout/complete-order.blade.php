@extends('frontend.includes.main')
@section('content')
    <div class="px-6 my-4">
        <div class="grid grid-cols-3 gap-6 ">
            <div class="col-span-2 p-4 border rounded-md">
                <div class="grid grid-cols-7 gap-12">
                    <div class="col-span-2">
                        <img src="{{ asset('frontend/assets/images/payment-methods/complete-order.png') }}" height="100px"
                            alt="">
                    </div>
                    <div class="col-span-5">
                        <h5 class="py-2 text-xl font-bold">Order Completed</h5>
                        <p><strong>Order No.</strong> <span>123-00-222</span></p>
                        <p>A confirmation email has been sent to you!</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 mt-4">
                    <div class="">
                        <h5 class="py-2 font-medium">Your Information</h5>
                        <p>{{ auth()->user()->fullname() }}</p>
                        <p>{{ auth()->user()->email }}</p>
                        <p>{{ auth()->user()->phone }}</p>
                    </div>
                    <div class="">
                        <h5 class="py-2 font-medium">Payment Information</h5>
                        <p>Payment Method: Esewa</p>
                        <p>{{ auth()->user()->phone }}</p>
                        <p>2081-04-19</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 mt-4">
                    <div class="">
                        <h5 class="py-2 font-medium">Shipping Information</h5>
                        <p>{{ auth()->user()->fullname() }}</p>
                        <p>{{ auth()->user()->email }}</p>
                        <p>{{ auth()->user()->phone }}</p>
                    </div>
                    <div class="">
                        <h5 class="py-2 font-medium">Billing Information</h5>
                        <p>Payment Method: Esewa</p>
                        <p>{{ auth()->user()->phone }}</p>
                        <p>2081-04-19</p>
                    </div>
                </div>
            </div>
            <div class="col">
                @include('frontend.cart.partials.summary')
                <div class="gap-3 mt-4 justify-content-between d-flex">
                    <a href="" class="border w-100 btn btn-light">Return Home</a>
                    <a href="" class=" w-100 btn btn-primary">View Order</a>
                </div>
            </div>
        </div>
    </div>
@endsection
