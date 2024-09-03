@extends('frontend.includes.main')
@section('content')
    <div class="grid grid-cols-5 gap-6 px-6 py-2">
        @include('frontend.account.includes.menu')
        <div class="col-span-4 space-y-8">
            @include('frontend.account.profile.partials.update-profile-information-form')
            @include('frontend.account.profile.partials.update-password-form')
        </div>
    </div>
    @include('frontend.page.partials.newsletter')
    @include('frontend.page.partials.features')
@endsection