@extends('frontend.includes.main')
@section('content')
    <ul class="flex gap-2 px-6 py-3 -mt-2 text-sm font-medium text-green-700 border-b">
        <li class="flex items-center gap-2">
            <i class="bx bx-home"></i>
            <span>Home</span>
        </li>
        <li><small>></small></li>
        <li><span>My Orders</li>
    </ul>
    <div class="grid grid-cols-5 gap-6 px-6 py-2">
        @include('frontend.account.includes.menu')
        <div class="col-span-4 space-y-8 border rounded">
            <table class="table w-full text-center">
                <thead>
                    <tr class="border-b bg-gray-50">
                        <th>Order No.</th>
                        <th class="py-4">Product</th>
                        <th class="py-4">Color</th>
                        <th class="py-4">Size</th>
                        <th class="py-4">Quantity</th>
                        <th class="py-4">Payment Status</th>
                        <th class="py-4">Delivery Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        @foreach ($order->orderItems as $item)
                            <tr class="border-b">
                                <td class="py-4" scope="row">{{ $order->id }}</td>
                                <td class="py-4"><a href="{{route('product.show',$item->product->id)}}">{{$item->product->name}}</a></td>
                                <td class="py-4">{{$item->color->color_name}}</td>
                                <td class="py-4">{{$item->size->size_name}}</td>
                                <td class="py-4">{{$item->quantity}}</td>
                                <td class="py-4 text-xs text-white"><span class="px-4 py-1 rounded  {{$order->payment_status==1?'bg-green-600':'bg-red-600'}}">{{$order->payment_status==1?'Paid':'Pending'}}</span></td>
                                <td class="py-4 text-xs text-white"><span class="px-4 py-1 rounded  {{$item->delivery_status==1?'bg-green-600':'bg-orange-400'}}">{{$item->delivery_status==1?'Delivered':'Processing'}}</span>
                                   @if ($item->delivery_status==2)
                                   <span><a href="{{route('order.delivery',$item->id)}}" class="px-3 py-1 text-xs text-white bg-green-400 rounded">Enter Otp</a></span>
                                   @endif
                                </td>
            
                            </tr>
                        @endforeach
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
