@extends('admin.includes.main')
@section('content')
    <div class="px-3 pt-3 text-stone-500">
        <a href="{{ route('admin.product.size.index') }}" class="">
            Home
        </a>
        <span>/</span>
        <a href="{{ route('admin.product.size.index') }}" class="">
            Vendor
        </a>
        <span>/</span>
        <a href="{{ route('admin.product.size.index') }}" class="">
            Verification
        </a>
    </div>
    <div class="grid grid-cols-3 gap-4 p-3 ">
        <div class="col-span-2 space-y-4">

            <div class="px-6 py-4 border rounded">
                <h2 class="text-xl font-semibold ">Vendor Details</h2>
                <ul class="py-4 space-y-4">
                    <li class="grid grid-cols-2 gap-2"><span>Shop Name:</span>{{ $user->name }}</span></li>
                    <li class="grid grid-cols-2 gap-2"><span>Email:</span>{{ $user->email }}</span></li>
                    <li class="grid grid-cols-2 gap-2"><span>Address:</span>{{ $user->vendor->address }}</span></li>
                    <li class="grid grid-cols-2 gap-2"><span>District:</span>{{ $user->vendor->district }}</span></li>
                    <li class="grid grid-cols-2 gap-2"><span>State:</span>{{ $user->vendor->state }}</span></li>
                    <li class="grid grid-cols-2 gap-2"><span>Account
                            Type:</span>{{ $user->vendor->id_detail->account_type }}</span></li>
                </ul>
            </div>
            <div class="px-6 py-4 border rounded">
                <h2 class="text-xl font-semibold ">ID Card Details</h2>
                <ul class="py-4 space-y-4">
                    <li class="grid grid-cols-2 gap-2"><span>ID Name:</span>{{ $user->vendor->id_detail->ID_Name }}</span>
                    </li>
                    <li class="grid grid-cols-2 gap-2"><span>ID
                            Number:</span>{{ $user->vendor->id_detail->ID_Number }}</span></li>
                    <li class="grid grid-cols-2 gap-2">
                        <div class="space-y-4">
                            <span>ID Card Front</span>
                            <img class="w-full h-40"
                                src="{{ asset('asset/images/vendor/card/' . $user->vendor->id_detail->ID_Card_Front) }}"
                                alt="">
                        </div>
                        <div class="space-y-4">
                            <span>ID Card Back</span>
                            <img class="w-full h-40"
                                src="{{ asset('asset/images/vendor/card/' . $user->vendor->id_detail->ID_Card_Back) }}"
                                alt="">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="px-6 py-4 border rounded">
                <h2 class="text-xl font-semibold ">Payment Methods:</h2>
                <ul class="py-4 space-y-4">
                    @foreach ($user->vendor->vendor_payment_modes as $method)
                        <li>{{ $method->payment_mode->method_name }}</li>
                    @endforeach

                </ul>
            </div>
        </div>
        <form action="{{ route('admin.vendor.verify', $user->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="space-y-4 ">
                <label class="block font-semibold">Verification Status</label>
                <select
                    class="block w-full text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                    name="status" id="">
                    <option value="1" {{ $user->status === 1 ? 'selected' : '' }}>Verified</option>
                    <option value="0" {{ $user->status === 0 ? 'selected' : '' }}>Unverified</option>
                </select>
            </div>

            <div class="flex justify-between gap-6">
                <a href="{{ route('admin.vendor.request') }}"
                    class="flex items-center justify-center w-full py-2 border rounded-md bg-gray-50">Back</a>
                <button type="submit" class="w-full py-2 text-white bg-green-600 rounded-md ">Verify</button>
            </div>
        </form>
    </div>
@endsection
