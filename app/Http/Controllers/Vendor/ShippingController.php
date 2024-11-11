<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ShippingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Shipping::with(['order.orderItems.product' => function ($query) {
                $query->where('vendor_id', Auth::user()->vendor->id);
            }])->select('*');
            return DataTables::of($data)->addIndexColumn()
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit = route('vendor.shippings.edit', $row->id);
                    return '<a href=' . $edit . ' class="px-3 py-1 text-sm text-white bg-blue-600 rounded">Manage</a>';
                })
                ->addColumn('payment_status', function ($row) {
                    if ($row->order->payment_status == 1) {
                        $status_class = 'active';
                        $status = 'Paid ';
                    } else {
                        $status_class = 'danger';
                        $status = 'Pending';
                    }
                    $payment_status = '<button class="px-4 py-1 text-sm text-white rounded w-fit ' . ($status_class === 'active' ? 'bg-green-500 ' : 'bg-red-500 ') . 'btn-sm "' . ' >' . $status . '</button>';
                    return $payment_status;
                })->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        $status_class = 'bg-green-500';
                        $status = 'Delivered';
                    } elseif ($row->status == 2) {
                        $status_class = 'bg-black';
                        $status = 'Out for Delivery';
                    } else {
                        $status_class = 'bg-orange-400';
                        $status = 'Processing';
                    }
                    $status = '<button class="px-4 py-1 text-sm text-white rounded w-fit ' . $status_class . ' btn-sm "' . ' >' . $status . '</button>';
                    return $status;
                })->filter(function ($instance) use ($request) {


                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                        $instance->where('status', $request->input('status'));
                    }

                })
                ->rawColumns(['payment_status', 'status', 'action'])
                ->make(true);
        }
        return view('vendor.shippings.index');
    }
    public function edit(Shipping $shipping)
    {
        return view('vendor.shippings.edit', compact('shipping'));
    }
    public function update(Request $request, Shipping $shipping, Product $product)
    {
        $data = $request->validate([
            'status' => 'required'
        ]);
        $shipping->update($data);
        $orderDetail = OrderDetail::where('order_id', $shipping->order_id)
            ->where('product_id', $shipping->product_id)
            ->whereHas('product', function ($query) use ($shipping) {
                $query->where('vendor_id', $shipping->vendor_id);
            })
            ->first();
        $orderDetail->update([
            'delivery_status' => $data['status']
        ]);
        return to_route('vendor.shippings.index')->with('success','Shipping has been updated');
    }
}
