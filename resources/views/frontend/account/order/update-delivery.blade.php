@extends('frontend.includes.main')
@section('content')
    <div class="p-6 my-4 border rounded">
        <table class="table w-1/2 p-4 text-left border">
            <tbody>
                <tr>
                    <th class="p-2">Order No.</th>
                    <td class="p-2">{{ $detail->order_id }}</td>
                </tr>
                <tr>
                    <th class="p-2">Product</th>
                    <td class="p-2">{{ $detail->product->name }}</td>
                </tr>
                <tr>
                    <th class="p-2">Color</th>
                    <td class="p-2">{{ $detail->color->color_name }}</td>
                </tr>
                <tr>
                    <th class="p-2">Size</th>
                    <td class="p-2">{{ $detail->size->size_name }}</td>
                </tr>
                <tr>
                    <th class="p-2">Quantity</th>
                    <td class="p-2">{{ $detail->quantity }}</td>
                </tr>
                <tr>
                    <th class="p-2">Total Amount</th>
                    <td class="p-2">{{ $detail->quantity * $detail->product->discount_price() }}</td>
                </tr>
                <tr>
                    <th class="p-2">OTP Number</th>
                    <td class="p-2">
                        <div x-data="{ open: false }" class="flex items-center space-x-2">
                            <p x-show="open" class="text-gray-700">
                                {{ $detail->otp }}
                            </p>
                            <button @click="open = !open" class="focus:outline-none">
                                <i x-show="!open" class='bx bx-show'></i>
                                <i x-show="open" class='bx bx-hide'></i>
                            </button>
                        
                       </td>
                </tr>
            </tbody>
        </table>
        <div class="my-4">
            <h2 class="text-lg font-bold text-green-600">Please update your delivery information if the product has been delivered</h2>
            <form action="{{route('order.delivery.update',$detail->id)}}" method="POST">
                @csrf
                <div class="my-4 space-x-3">
                    <label for="">Enter Otp</label>
                    <input type="text" class="bg-gray-100 rounded" name="otp">
                </div>
                <button class="px-6 py-2 text-white bg-blue-600 rounded">Submit</button>
            </form>
        </div>
    </div>
@endsection
