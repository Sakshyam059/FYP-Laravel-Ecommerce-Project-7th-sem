<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerPostRequest;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Banner::with('category')->select('*');
            return DataTables::of($data)->addIndexColumn()
            ->addIndexColumn()
                ->editColumn('select_all', function ($row) {
                    return '<input class="mx-3 rounded select-all lg:mx-1" type="checkbox" name="banners[]" value="' . $row->id . '"/>';
                })->editColumn('image',function($row){
                    $image=asset('asset/images/banners/'.$row->image);
                    return "<img src='$image' class='object-cover w-2/3 h-16' />";
                })->editColumn('category_name',function($row){
                    return $row->category->category_name;
                })->editColumn('status', function ($row) {
                if ($row->status === 1) {
                    $status_class = 'active';
                    $status = 'Active';
                } else {
                    $status_class = 'danger';
                    $status = 'Inactive';
                }
                $status_btn = '<button class="px-4 py-1 text-sm text-white rounded w-fit ' . ($status_class === 'active' ? 'bg-green-500 ' : 'bg-red-500 ') . '"' . ' >' . $status . '</button>';
                return $status_btn;
            })->addColumn('action', function ($row) {
                $edit = route('admin.promotion.banner.edit', $row->id);
                $delete = route('admin.promotion.banner.destroy', $row->id);

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
                ->rawColumns(['select_all','image','category_name','status', 'action'])
                ->make(true);
        }
        $categories=Category::get();
        return view('admin.banner.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerPostRequest $request)
    {
        try{
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $imagepath = time() . '_' . $name;
                $file->move(public_path('asset/images/banners/'), $imagepath);
                $data['image'] = $imagepath;
            }
            Banner::create($data);
            return response()->json(['status' => 200, 'success' => true, 'message' => 'Banner Created successfully']);
        } catch (\Exception $e) {
            return Redirect::back()->with('error', 'Failed to create  banner. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        try {
            if ($banner) {
                File::delete(public_path('asset/images/banners/' . $banner->image));
                $banner->delete();
                
                return response()->json(['status' => 200, 'message' => 'Banner deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Banner not found'], 404);
        }
    }
}
