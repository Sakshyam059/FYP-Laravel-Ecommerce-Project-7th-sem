@extends('admin.includes.main')
@section('content')
    <div class="my-4">
        <h2 class="text-2xl font-bold">Remaining Amount</h2>
        <div class="p-4 mt-4 space-y-5 border">
            <div class="text-lg font-bold">
                <h2>{{$vendor->user->name}}</h2>
                <h2 class="text-green-600 ">Rs {{$vendor->vendor_payments()->sum('remaining_amount')}}</h2>
            </div>
            <form action="{{route('admin.vendor.pay.amount',$vendor->id)}}" method="POST">
                @csrf
                <button class="px-6 py-2 text-white bg-purple-600 rounded">Procced to Pay</button>
            </form>
        </div>
    </div>
@endsection