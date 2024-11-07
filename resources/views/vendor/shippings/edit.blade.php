@extends('vendor.includes.main')
@section('content')
    <div>
        <div class="p-4 border">
            <form action="{{ route('vendor.shippings.update', $shipping->id) }}" method="post">
                @method('PUT')
                @csrf
                <table class="text-left" width="100%">
                    <tbody>
                        <tr>
                            <th class="py-2">Shipping No.</th>
                            <td class="py-2">{{ $shipping->id }}</td>
                        </tr>
                        <tr>
                            <th class="py-2">Product</th>
                            <td class="py-2">{{ $shipping->product->name }}</td>
                        </tr>
                        <tr>
                            <th class="py-2">Order No.</th>
                            <td class="py-2">{{ $shipping->order_id }}</td>
                        </tr>
                        <tr>
                            <th class="py-2">Address</th>
                            <td class="py-2">{{ $shipping->address }}</td>
                        </tr>
                        <tr>
                            <th class="py-2">City</th>
                            <td class="py-2">{{ $shipping->city }}</td>
                        </tr>
                        <tr>
                            <th class="py-2">State</th>
                            <td class="py-2">{{ $shipping->state }}</td>
                        </tr>
                        <tr>
                            <th class="py-2">Zipcode</th>
                            <td class="py-2">{{ $shipping->zipcode }}</td>
                        </tr>
                        <tr>
                            <th class="py-2">Status</th>
                            <td class="py-2">
                                @if ($shipping->status != 1)
                                    <select name="status" id="">
                                        <option value="2" {{ $shipping->status == 2 ? 'selected' : '' }}>Out for
                                            Delivery
                                        </option>
                                        <option value="0" {{ $shipping->status == 0 ? 'selected' : '' }}>Processing
                                        </option>
                                    </select>
                                @else
                                    <span class="font-bold text-green-600">Delivered</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                @if ($shipping->status != 1)
                    <div>
                        <button class="px-6 py-2 text-white bg-blue-600 rounded">Update</button>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
