@extends('frontend.includes.main')
@section('content')
        <div class="grid grid-cols-5 bg-white">
            @include('frontend.products.partials.filter-bar')
            @include('frontend.products.partials.result-bar')
        </div>
@endsection