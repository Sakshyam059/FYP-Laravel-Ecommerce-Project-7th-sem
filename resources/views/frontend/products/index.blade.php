@extends('frontend.includes.main')
@section('content')
        <div class="grid -mt-2 bg-white lg:grid-cols-5">
            @include('frontend.products.partials.filter-bar')
            @include('frontend.products.partials.result-bar')
        </div>
@endsection