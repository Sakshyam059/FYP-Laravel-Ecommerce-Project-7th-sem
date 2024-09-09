@extends('vendor.includes.main')
@section('content')
    <form action="{{route('vendor.verify')}}" method="post" class="px-3 py-4 space-y-4 " enctype="multipart/form-data">
        @csrf
            @include('vendor.profile.partials.profile-info')
            @include('vendor.profile.partials.address-info')
            @include('vendor.profile.partials.verification-info')
            @include('vendor.profile.partials.payment-info')
            <div>
                <button class="px-12 py-2 text-white bg-green-600 rounded">Submit </button>
            </div>
    </form>
@endsection
