<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CategoryPostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select('*');
            return DataTables::of($data)->addIndexColumn()
                ->addIndexColumn()
                ->editColumn('select_categories', function ($row) {
                    return '<input class="mx-3 select-all lg:mx-1" type="checkbox" name="categories[]" value="' . $row->id . '"/>';
                })->editColumn('thumbnail_image',function($row){
                    $image=asset('asset/images/category/'.$row->thumbnail_image);
                    return "<img src='$image' class='object-contain h-12 mr-auto' />" ;
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
                    $edit = route('admin.product.category.edit', $row->id);
                    $delete = route('admin.product.category.destroy', $row->id);

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
                ->rawColumns(['select_categories','thumbnail_image', 'status', 'action'])
                ->make(true);
        }
        return view('admin.category.index');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryPostRequest $request)
    {
        try {
            $validator = $request->validated();
            $validator['slug'] = Str::slug($request->category_name);
            if ($request->hasFile('thumbnail_image')) {
                $file = $request->file('thumbnail_image');
                $name = $file->getClientOriginalName();
                $imagepath = time() . '_' . $name;
                $file->move(public_path('asset/images/category/'), $imagepath);
                $validator['thumbnail_image'] = $imagepath;
            }
            Category::create($validator);
            return response()->json(['status' => 200, 'success' => true, 'message' => 'Category Created successfully']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create  category. Please try again.');
        }
        return Redirect::back();
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryPostRequest $request, Category $category)
    {
        try {
            $validator = $request->validated();
            $validator['slug'] = Str::slug($request->category_name);
            if ($request->hasFile('thumbnail_image')) {
                $file = $request->file('thumbnail_image');
                $name = $file->getClientOriginalName();
                $imagepath = time() . '_' . $name;
                File::delete(public_path('asset/images/category/' . $category->thumbnail_image));
                $file->move(public_path('asset/images/category/'), $imagepath);
                $validator['thumbnail_image'] = $imagepath;
            }
            $category->update($validator);
            return to_route('admin.product.category.index')->with('success', 'Category Updated Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update category. Please try again.');
        }
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            if ($category) {
                File::delete(public_path('asset/images/category/'.$category->thumbnail_image));
                $category->delete();
                return response()->json(['status' => 200, 'message' => 'Category deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Category not found'], 404);
        }
    }
}