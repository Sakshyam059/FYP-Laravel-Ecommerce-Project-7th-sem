@extends('frontend.includes.main')
@section('title')
    Shopping-Cart
@endsection
@section('content')
    <div>
        @include('frontend.cart.partials.product-list')
        <div class="grid grid-cols-2 gap-6 px-6 py-2">
            @include('frontend.cart.partials.shipping-info')
            <div class="p-4 space-y-4 border rounded">
                @include('frontend.cart.partials.summary')
                <div>
                    <a href="{{route('checkout.billing')}}" class="py-2 text-white bg-yellow-500 rounded px-14">Confirm and Proceed</a>
                </div>
            </div>
        </div>

    </div>
@endsection