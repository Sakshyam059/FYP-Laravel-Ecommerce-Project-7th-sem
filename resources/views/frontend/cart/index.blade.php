@extends('frontend.includes.main')
@section('title')
    Shopping-Cart
@endsection
@section('content')
<div class="p-4 space-y-4">
    @include('frontend.cart.partials.product-list')
    
    <div class="grid gap-6 px-4 py-2 md:px-6 md:py-4 md:grid-cols-2">
        <div class="space-y-4">
            @include('frontend.cart.partials.shipping-info')
        </div>
        <div class="p-4 space-y-4 bg-white border rounded shadow-sm">
            @include('frontend.cart.partials.summary')
            <div>
                <a href="{{ route('checkout.billing') }}" class="block px-6 py-2 text-center text-white bg-yellow-500 rounded md:px-14">
                    Confirm and Proceed
                </a>
            </div>
        </div>
    </div>
</div>

@endsection