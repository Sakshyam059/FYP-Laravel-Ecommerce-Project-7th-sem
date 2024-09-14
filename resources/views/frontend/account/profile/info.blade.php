@extends('frontend.includes.main')
@section('content')
<ul class="flex gap-2 px-6 py-3 -mt-2 text-sm font-medium text-green-700 border-b">
    <li class="flex items-center gap-2">
        <i class="bx bx-home"></i>
        <span>Home</span>
    </li>
    <li><small>></small></li>
    <li><span>Profile Information</li>
</ul>
    <div class="grid grid-cols-5 gap-6 px-6 py-2">
        @include('frontend.account.includes.menu')
        <div class="col-span-4 px-4 py-2 space-y-8 border rounded">
           <div class="space-y-2">
                <div class="flex items-center justify-between">
                    <h2 class="font-medium underline">Personal Info</h2>
                    <a href="{{route('profile.edit')}}" class="px-2 py-1 text-sm text-white bg-green-500 rounded">
                        <i class="bx bx-edit"></i>
                        <span>Edit</span></a>
                </div>
                <table class="w-full">
                    <tr >
                        <td class="py-2">Customer Name</td>
                        <td class="py-2">{{$user->name}}</td>
                    </tr>
                    <tr >
                        <td class="py-2">Email</td>
                        <td class="py-2">{{$user->email}}</td>
                    </tr>
                    <tr >
                        <td class="py-2">Phone / Mobile</td>
                        <td class="py-2">{{$user->phone}}</td>
                    </tr>
                   
                </table>
           </div>
        </div>
    </div>
    @include('frontend.page.partials.features')
@endsection