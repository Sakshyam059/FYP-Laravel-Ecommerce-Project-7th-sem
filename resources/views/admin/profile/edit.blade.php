@extends('admin.includes.main')
@section('content')
    <div class="">
        <div class="px-2 pt-3 lg:py-3 lg:px-0">
            @include('profile.partials.update-profile-information-form')
        </div>
        <div class="mt-4 ">

            @include('profile.partials.update-password-form')
        </div>
    </div>
@endsection
