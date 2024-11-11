<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\PaymentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $data = PaymentTransaction::whereHas('order.orderItems.product.vendor', function($query){
            $query->where('id', Auth::user()->vendor->id);
        })->select('*')->latest();
        if ($request->ajax()) {
            return DataTables::of($data)->addIndexColumn()
                ->addIndexColumn()->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        $status_class = 'active';
                        $status = 'Paid ';
                    } else {
                        $status_class = 'danger';
                        $status = 'Pending';
                    }
                    $payment_status = '<button class="px-4 py-1 text-sm text-white rounded w-fit ' . ($status_class === 'active' ? 'bg-green-500 ' : 'bg-red-500 ') . 'btn-sm "' . ' >' . $status . '</button>';
                    return $payment_status;
                })
                ->rawColumns(['status'])
                ->make(true);
        }
        return view('vendor.payment.index');
    }
}
