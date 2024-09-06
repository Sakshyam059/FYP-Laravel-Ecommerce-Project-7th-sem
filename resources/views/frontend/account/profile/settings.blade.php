@extends('frontend.includes.main')
@section('content')
<ul class="flex gap-2 px-6 py-3 -mt-2 text-sm font-medium text-green-700 border-b">
    <li class="flex items-center gap-2">
        <i class="bx bx-home"></i>
        <span>Home</span>
    </li>
    <li><small>></small></li>
    <li><span>Profile</li>
    <li><small>></small></li>

    <li>Setting</li>
</ul>
    <div class="grid grid-cols-5 gap-6 px-6 py-2">
        @include('frontend.account.includes.menu')
        <div class="col-span-4 px-4 py-2 space-y-8 border rounded">
            @include('frontend.account.profile.partials.update-profile-information-form')
            @include('frontend.account.profile.partials.update-password-form')
        </div>
    </div>
    @include('frontend.page.partials.newsletter')
    @include('frontend.page.partials.features')
@endsection