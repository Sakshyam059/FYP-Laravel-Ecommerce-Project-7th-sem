<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = OrderDetail::with('product.vendor')
            ->whereHas('product.vendor', function ($query) {
                $query->where('id', Auth::user()->vendor->id);
            })->select('*');
            return DataTables::of($data)->addIndexColumn()
                ->addIndexColumn()
                ->editColumn('user_id',function($row){
                    return $row->order->user_id;
                })
                ->editColumn('color_id',function($row){
                    return $row->color->color_name;
                })
                ->editColumn('size_id',function($row){
                    return $row->size->size_name;
                })
                ->editColumn('payment_status', function ($row) {
                    if ($row->order->payment_status == 1) {
                        $status_class = 'active';
                        $status = 'Paid ';
                    } else {
                        $status_class = 'danger';
                        $status = 'Pending';
                    }
                    $payment_status = '<button class="px-4 py-1 text-sm text-white rounded w-fit ' . ($status_class === 'active' ? 'bg-green-500 ' : 'bg-red-500 ') . 'btn-sm "' . ' >' . $status . '</button>';
                    return $payment_status;
                })->editColumn('delivery_status', function ($row) {
                    if ($row->order->is_completed == 1) {
                        $status_class = 'active';
                        $status = 'Delivered';
                    } elseif($row->order->is_completed == 2) {
                        $status_class = 'danger';
                        $status = 'Out for Delivery';     
                    } else {
                        $status_class = 'danger';
                        $status = 'Processing';
                    }
                    $delivery_status = '<button class="px-4 py-1 text-sm text-white rounded w-fit ' . ($status_class === 'active' ? 'bg-green-500 ' : 'bg-red-500 ') . 'btn-sm "' . ' >' . $status . '</button>';
                    return $delivery_status;
                })->filter(function ($instance) use ($request) {


                    if ($request->get('payment_status') == '0' || $request->get('payment_status') == '1') {
                        $instance->where('payment_status', $request->input('payment_status'));
                    }


                    if (!empty($request->get('search'))) {
                        $search = $request->get('search');
                        $instance->where(function ($query) use ($search) {
                            $query->where('category_name', 'like', '%' . $search . '%');
                        });
                    }
                })
                ->rawColumns(['payment_status','delivery_status'])
                ->make(true);
        }
        return view('vendor.order.index');
    }
}

