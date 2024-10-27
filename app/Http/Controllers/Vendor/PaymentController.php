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
        })->select('*');
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
                })->addColumn('action', function ($row) {
                    $edit = route('admin.product.brand.edit', $row->id);
                    $action = '<div x-data="{ open: false }" class="relative">
                <button @click="open = ! open" class=" focus:outline-none">
                  <i class="bx bx-dots-vertical-rounded"></i> </button>
                <div x-cloak x-show="open" @click.away="open = false" class="absolute right-0 z-10 p-2 bg-white border border-gray-200 rounded-lg shadow ">
                    <a href=' . $edit . ' class="inline-flex items-center w-full gap-3 px-2 py-1 text-sm cursor-pointer hover:bg-sky-100">
                        <i class="bx bx-edit-alt"></i>    
                        <span>Manage Delivery</span>
                    </a>
                </div>
            </div>';
                    return $action;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('vendor.payment.index');
    }
}
