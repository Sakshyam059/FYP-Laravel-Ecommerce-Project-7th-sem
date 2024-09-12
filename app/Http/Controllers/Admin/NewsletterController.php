<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NewsletterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Newsletter::select('*');
            return DataTables::of($data)->addIndexColumn()
                ->addIndexColumn()
                ->editColumn('select_all', function ($row) {
                    return '<input class="mx-3 rounded select-all lg:mx-1" type="checkbox" name="newsletters[]" value="' . $row->id . '"/>';
                })->editColumn('status', function ($row) {
                    if ($row->status === 1) {
                        $status_class = 'active';
                        $status = 'Active';
                    } else {
                        $status_class = 'danger';
                        $status = 'Inactive';
                    }
                    $status_btn = '<button class="w-100 btn ' . ($status_class === 'active' ? 'btn-outline-success ' : 'btn-outline-danger ') . 'btn-sm "' . ' >' . $status . '</button>';
                    return $status_btn;
                })->addColumn('action', function ($row) {
                    $edit = route('admin.newsletter.edit', $row->id);
                    $delete = route('admin.newsletter.destroy', $row->id);
    
                    $btn = '<div x-data="{ open: false }" class="relative">
                <button @click="open = ! open" class=" focus:outline-none">
                  <i class="bx bx-dots-vertical-rounded"></i> </button>
                <div x-cloak x-show="open" @click.away="open = false" class="absolute right-0 z-10 p-2 bg-white border border-gray-200 rounded-lg shadow ">
                    <a href=' . $edit . ' class="inline-flex items-center w-full gap-3 px-2 py-1 text-sm cursor-pointer hover:bg-sky-100">
                        <i class="bx bx-edit-alt"></i>    
                        <span>Edit</span>
                    </a>
                    <a href=' . $edit . ' class="inline-flex items-center w-full gap-3 px-2 py-1 text-sm cursor-pointer hover:bg-sky-100">
                        <i class="bx bx-show-alt"></i>
                        <span>View</span>
                    </a>
                    <button class="inline-flex items-center w-full gap-3 px-2 py-1 text-sm cursor-pointer deleteBtn hover:bg-sky-100"  data-route="' . $delete . '">
                    <i class="bx bx-trash" ></i>   
                    <span>Delete</span>
                    </button>
                </div>
            </div>';
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
        return view('admin.newsletter.index');
    }
}
