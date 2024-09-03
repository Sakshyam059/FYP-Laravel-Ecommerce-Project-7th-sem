@extends('frontend.includes.main')
@section('title')
    Shopping-Cart
@endsection
@section('content')
    <div>
        @include('frontend.cart.partials.product-list')
        <div class="grid grid-cols-2 gap-6 px-6 py-2">
            @include('frontend.cart.partials.shipping-info')
            <div>
                @include('frontend.cart.partials.summary')
                <div class="mt-3">
                    <a href="{{route('checkout.billing')}}" class="py-2 btn btn-primary btn-sm w-100">Confirm and Proceed</a>
                </div>
            </div>
        </div>

    </div>
@endsection