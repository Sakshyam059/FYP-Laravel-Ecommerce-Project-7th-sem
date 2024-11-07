<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UsertypeEnum;
use App\Enums\VerificationEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VendorController extends Controller
{
    public function verificationRequest(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('usertype',UsertypeEnum::VENDOR->value)->where('status', VerificationEnum::PENDING->value)->select('*');
            return DataTables::of($data)->addIndexColumn()
                ->addIndexColumn()
                ->editColumn('select_all', function ($row) {
                    return '<input class="mx-3 rounded select-all lg:mx-1" type="checkbox" name="vendors[]" value="' . $row->id . '"/>';
                })->editColumn('status', function ($row) {
                    if ($row->status === 1) {
                        $status_class = 'active';
                        $status = 'Verified';
                    } else {
                        $status_class = 'danger';
                        $status = 'Pending';
                    }
                    $status_btn = '<button class="px-4 py-1 text-sm text-white rounded w-fit ' . ($status_class === 'active' ? 'bg-green-500 ' : 'bg-red-500 ') . 'btn-sm "' . ' >' . $status . '</button>';
                    return $status_btn;
                })->addColumn('action', function ($row) {
                    $show = route('admin.vendor.show', $row->id);
                    $delete = route('admin.product.subcategory.destroy', $row->id);

                    $btn = '
                        <a href=' . $show . ' class="inline-flex items-center gap-1 px-2 py-1 mx-2 text-sm text-white bg-green-600 rounded cursor-pointer hover:bg-sky-100">
                            <i class="bx bx-badge-check"></i>
                            <span>Verify</span>
                        </a>
                   ';
                    return $btn;
                })->filter(function ($instance) use ($request) {


                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                        $instance->where('status', $request->input('status'));
                    }


                    if (!empty($request->get('search'))) {
                        $search = $request->get('search');
                        $instance->where(function ($query) use ($search) {
                            $query->where('category_name', 'like', '%' . $search . '%');
                        });
                    }
                })
                ->rawColumns(['select_all', 'status', 'action'])
                ->make(true);
        }
        return view('admin.vendor.request');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('usertype',UsertypeEnum::VENDOR->value)->where('status', 1)->select('*');
            return DataTables::of($data)->addIndexColumn()
                ->addIndexColumn()
                ->editColumn('select_all', function ($row) {
                    return '<input class="mx-3 rounded select-all lg:mx-1" type="checkbox" name="vendors[]" value="' . $row->id . '"/>';
                })->addColumn('product',function($row){
                    return $row->vendor->products->count();
                })->addColumn('amount',function($row){
                    return $row->vendor->vendor_payments()->sum('remaining_amount');
                })->editColumn('status', function ($row) {
                    if ($row->status === 1) {
                        $status_class = 'bg-green-400';
                        $status = 'Verified';
                    }else if ($row->status === 2) {
                        $status_class = 'bg-yellow-400';
                        $status = 'Pending';
                    } else {
                        $status_class = 'bg-red-600';
                        $status = 'Pending';
                    }
                    $status_btn = '<button class="px-4 py-1 text-sm text-white rounded w-fit ' . $status_class . ' btn-sm "' . ' >' . $status . '</button>';
                    return $status_btn;
                })->addColumn('action', function ($row) {
                    $show = route('admin.vendor.show', $row->id);
                    $pay = route('admin.vendor.pay', $row->vendor->id);
                    $btn = '
                        <a href=' . $show . ' class="inline-flex items-center gap-1 px-2 py-1 mx-2 text-sm text-white bg-green-600 rounded cursor-pointer hover:bg-sky-100">
                            <i class="bx bx-badge-check"></i>
                            <span>Verify</span>
                        </a>
                        <a href=' . $pay . ' class="inline-flex items-center gap-1 px-2 py-1 mx-2 text-sm text-white bg-purple-600 rounded cursor-pointer hover:bg-sky-300">
                            <i class="bx bx-credit-card"></i>
                            <span>Pay</span>
                        </a>
                   ';
                    return $btn;
                })->filter(function ($instance) use ($request) {


                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                        $instance->where('status', $request->input('status'));
                    }


                    if (!empty($request->get('search'))) {
                        $search = $request->get('search');
                        $instance->where(function ($query) use ($search) {
                            $query->where('category_name', 'like', '%' . $search . '%');
                        });
                    }
                })
                ->rawColumns(['select_all', 'status', 'action'])
                ->make(true);
        }
        return view('admin.vendor.index');
    }

    public function show($id)
    {
        $user=User::with('vendor')->findOrFail($id);
        return view('admin.vendor.show', compact('user'));
    }
    public function verifyVendor(Request $request,User $user)
    {
        try {
            $user->status = $request->status;
            $user->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect()->route('homepage');
    }
}
