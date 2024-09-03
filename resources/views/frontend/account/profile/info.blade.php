@extends('frontend.includes.main')
@section('content')
    <div class="grid grid-cols-5 gap-6 px-6 py-2">
        @include('frontend.account.includes.menu')
        <div class="col-span-4 p-4 space-y-8 border rounded">
           <div class="space-y-4 ">
                <div>
                    <h2 class="font-medium underline">Personal Info</h2>
                </div>
                <table class="w-full">
                    <tr >
                        <td class="pb-2">Customer Name</td>
                        <td class="pb-2">{{$user->fullname()}}</td>
                    </tr>
                    <tr >
                        <td class="pb-2">Email</td>
                        <td class="pb-2">{{$user->email}}</td>
                    </tr>
                    <tr >
                        <td class="pb-2">Phone / Mobile</td>
                        <td class="pb-2">{{$user->phone}}</td>
                    </tr>
                    <tr >
                        <td class="pb-2">Address</td>
                        <td class="pb-2">{{$user->address}}</td>
                    </tr>
                    
                </table>
           </div>
        </div>
    </div>
    @include('frontend.page.partials.newsletter')
    @include('frontend.page.partials.features')
@endsection