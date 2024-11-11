@extends('frontend.includes.main')
@section('content')
<section class="px-6">
    <div class="grid grid-cols-3 gap-6 ">
        <div class="col-span-2 p-4 space-y-6 border rounded">
            <div class="grid grid-cols-7 gap-12">
                <div class="col-span-2">
                    <img class="h-28" src="{{ asset('frontend/assets/static/images/payment-methods/complete-order.png') }}" 
                        alt="">
                </div>
                <div class="col-span-5 space-y-2">
                    <h5 class="text-xl font-bold">Order Completed</h5>
                    {{-- <p><strong>Order No.</strong> <span></span></p> --}}
                    <p>A confirmation email has been sent to you!</p>
                </div>
            </div>
            <div class="grid grid-cols-2">
                <div class="space-y-2">
                    <h5 class="font-medium ">Your Information</h5>
                    <p>{{ auth()->user()->name }}</p>
                    <p>{{ auth()->user()->email }}</p>
                    <p>{{ auth()->user()->phone }}</p>
                </div>
                <div class="space-y-2">
                    <h5 class="font-medium ">Payment Information</h5>
                    <p>Payment Method: {{$payment_method}}</p>
                    <p>{{ auth()->user()->phone }}</p>
                    <p>2081-04-19</p>
                </div>
            </div>
            <div class="grid grid-cols-2">
                <div class="space-y-2">
                    <h5 class="font-medium ">Shipping Information</h5>
                    <p>Address: {{ $shipping_detail['address'] }}</p>
                    <p>City: {{ $shipping_detail['city'] }}</p>
                    <p>State: {{ $shipping_detail['state'] }}</p>
                    <p>Zipcode: {{ $shipping_detail['zipcode'] }}</p>
                </div>
                <div class="space-y-2">
                    <h5 class="font-medium ">Billing Information</h5>
                    <p>Name: {{ auth()->user()->name }}</p>
                    <p>Email: {{ auth()->user()->email }}</p>
                    <p>Phone: {{ auth()->user()->phone }}</p>
                    <p>Address: {{ $billing_information['address'] }}</p>
                    <p>City: {{ $billing_information['city'] }}</p>
                    <p>State: {{ $billing_information['state'] }}</p>
                    <p>Zipcode: {{ $billing_information['zipcode'] }}</p>
                    <p>2081-04-19</p>
                </div>
            </div>
        </div>
        <div class="p-4 border rounded h-fit">
            @include('frontend.cart.partials.summary')
            <div class="flex justify-between gap-3">
                <a href="{{route('homepage')}}" class="flex items-center justify-center w-full py-2 border rounded bg-gray-50">Return Home</a>
                <a href="{{route('order.index')}}" class="flex items-center justify-center w-full py-2 text-white bg-blue-600 border rounded">View Order</a>
            </div>
        </div>
    </div>
</section>
@endsection
