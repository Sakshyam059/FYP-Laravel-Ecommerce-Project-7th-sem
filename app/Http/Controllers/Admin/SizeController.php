<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\SizePostRequest;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SizeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Size::select('*');
            return DataTables::of($data)->addIndexColumn()
            ->addIndexColumn()
                ->editColumn('select_sizes', function ($row) {
                    return '<input class="mx-3 select-all lg:mx-1" type="checkbox" name="sizes[]" value="' . $row->id . '"/>';
                })->editColumn('status', function ($row) {
                if ($row->status === 1) {
                    $status_class = 'active';
                    $status = 'Active';
                } else {
                    $status_class = 'danger';
                    $status = 'Inactive';
                }
                $status_btn = '<button class="px-4 py-1 text-sm text-white rounded w-fit ' . ($status_class === 'active' ? 'bg-green-500 ' : 'bg-red-500 ') . 'btn-sm "' . ' >' . $status . '</button>';           
                return $status_btn;
            })->addColumn('action', function ($row) {
                $edit = route('admin.product.size.edit', $row->id);
                $delete = route('admin.product.size.destroy', $row->id);

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
                    $search=$request->get('search');
                    $instance->where(function ($query) use ($search){
                        $query->where('category_name', 'like', '%'.$search.'%');
                    });
                   
                }
            })
                ->rawColumns(['select_sizes','status', 'action'])
                ->make(true);
        }
        return view('admin.size.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SizePostRequest $request)
    {
        try {
            $validator = $request->validated();
            $validator['slug'] = Str::slug($request->size_name);
           Size::create($validator);
            
            return response()->json(['status' => 200, 'success' => true, 'message' => 'Size Created successfully']);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('admin.size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SizePostRequest $request, Size $size)
    {
        try {
            $validator = $request->validated();
            $validator['slug'] = Str::slug($request->size_name);
            $size->update($validator);
            return to_route('admin.product.size.index')->with('success', 'Size Updated Successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update size. Please try again.');

        }
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        try {
            if ($size) {
                $size->delete();
                return response()->json(['status' => 200, 'message' => 'Size deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Size not found'], 404);
        }
    }
}
