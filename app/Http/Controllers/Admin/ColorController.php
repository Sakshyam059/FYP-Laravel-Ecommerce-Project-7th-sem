<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ColorPostRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Color::select('*');
            return DataTables::of($data)->addIndexColumn()
            ->addIndexColumn()
                ->editColumn('select_colors', function ($row) {
                    return '<input class="mx-3 select-all lg:mx-1" type="checkbox" name="colors[]" value="' . $row->id . '"/>';
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
                $edit = route('admin.product.color.edit', $row->id);
                $delete = route('admin.product.color.destroy', $row->id);

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
                ->rawColumns(['select_colors','status', 'action'])
                ->make(true);
        }
        return view('admin.color.index');
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
    public function store(ColorPostRequest $request)
    {
        try {
            $validator = $request->validated();
            $validator['slug'] = Str::slug($request->color_name);
            Color::create($validator);
            
            return response()->json(['status' => 200, 'success' => true, 'message' => 'Color Created successfully']);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     */
    public function show($category)
    {
        $subcategories = Color::where('category_id', $category)->get();
        return response()->json($subcategories);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        
        return view('admin.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorPostRequest $request, Color $color)
    {
        try {
            $validator = $request->validated();
            $validator['slug'] = Str::slug($request->color_name);
            $color->update($validator);
            return to_route('admin.product.color.index')->with('success', 'Color Updated Successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update color. Please try again.');

        }
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        try {
            if ($color) {
                $color->delete();
                return response()->json(['status' => 200, 'message' => 'Color deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Color not found'], 404);
        }
    }
}
