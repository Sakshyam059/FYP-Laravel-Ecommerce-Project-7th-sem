<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CategoryPostRequest;
use App\Http\Requests\Product\ProductImagePostRequest;
use App\Http\Requests\Product\ProductPostRequest;
use App\Http\Requests\Product\SubcategoryPostRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSku;
use App\Models\Subcategory;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $vendor=Vendor::where('user_id',Auth::id())->first();
        if ($request->ajax()) {
            $data = Product::where('vendor_id',$vendor->id)->with('mainImage')->select('id', 'name', 'category_id','brand_id','price','discount_value', 'status');
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('select_all', function ($row) {
                    return '<input class="mx-3 border-gray-300 rounded select-all lg:mx-1" type="checkbox" name="products[]" value="' . $row->id . '"/>';
                })->editColumn('name', function ($row) {
                    $imagepath = asset('asset/images/product/' . $row->mainImage->image);
                    $name = "<div class='flex items-center gap-3 overflow-hidden '>
                <img src='$imagepath' class='w-8 h-8' />
                <span>$row->name</span>
                </div>";
                    return $name;
                })->editColumn('category_id', function ($row) {
                    return $row->category->category_name;
                })->editColumn('brand_id', function ($row) {
                    return $row->brand->brand_name;
                })->editColumn('status', function ($row) {
                })->addColumn('deal', function ($row) {
                    $deal = route('vendor.product-deal.create', $row->id);
                    $deal_btn='<a href=' . $deal . ' class="inline-flex items-center gap-3 px-2 py-1 text-sm text-white bg-yellow-400 rounded cursor-pointer hover:bg-sky-600">   
                                        <span>Add to Deal</span>
                                    </a>';
                    if($row->productDeal){
                        return $row->productDeal->deal->deal_name;
                    }
                    return $deal_btn;
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
                    $edit = route('vendor.product.edit', $row->id);
                    $delete = route('vendor.product.destroy', $row->id);

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
                    if ($request->get('name')) {
                        $instance->orderBy('name', 'asc');
                    }
                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                        $instance->where('status', $request->input('status'));
                    }

                    // if ($request->get('min') || $request->get('max')) {
                    //     $instance->whereBetween('price', [$request->get('min') ?? 0, $request->get('max') ?? 199999]);
                    // }

                    if (!empty($request->get('search'))) {
                        $search = $request->get('search');
                        $instance->where(function ($query) use ($search) {
                            $query->where('name', 'like', '%' . $search . '%');
                        });
                    }
                })
                ->rawColumns(['select_all', 'deal','name', 'status', 'action'])
                ->make(true);
        }
        return view('vendor.product.index');
    }
    public function show()
    {
        return view('vendor.includes.main');
    }
    public function create()
    {
        $categories = Category::get();
        $product = new Product();
        return view('vendor.product.create', compact('categories', 'product'));
    }

    public function storeDescriptionImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
    public function store(ProductPostRequest $request, ProductImagePostRequest $imgrequest,CategoryPostRequest $category, SubcategoryPostRequest $subcategory)
    {
        $vendor=Vendor::where('user_id',Auth::id())->first();
        DB::beginTransaction();
        try {
            $validator = $request->validated();
            $validator['vendor_id']=$vendor['id'];
            if($request->category_id==0){
                $category->validated();
                $cat=Category::create([
                    'category_name'=>$category->category_name,
                    'slug'=>Str::slug($category->category_name)
                ]);
                $validator['category_id']=$cat['id'];
            }
            if($request->subcategory_id==0){
                $subcategory->validated();
                $sub=Subcategory::create([
                    'subcategory_name'=>$subcategory->subcategory_name,
                    'category_id'=>$validator['category_id'],
                    'slug'=>Str::slug($subcategory->subcategory_name)
                ]);
                $validator['subcategory_id']=$sub['id'];
            }
            $validator['slug'] = Str::slug($request->name);
            $validator['trending'] = $request['trending'] ? 1 : 0;

            $product = Product::create($validator);

            foreach ($request->skus as $sku) {
                if (!in_array(null, $sku, true)) {
                    ProductSku::create([
                        'product_id' => $product->id,
                        'color_id' => $sku['color_id'],
                        'size_id' => $sku['size_id'],
                        'quantity' => $sku['quantity'],
                    ]);
                }else{
                    throw new \Exception("Skus has null value");
                }
            }

            $product_image = $imgrequest->validated();
            if ($imgrequest->hasFile('image')) {
                $files = $imgrequest->file('image');
                foreach ($files as $key => $file) {
                    if ($key === 0) {
                        $product_image['is_main'] = 1;
                    }else{
                        $product_image['is_main'] = 0;
                    }
                    $product_image['product_id'] = $product['id'];
                    $name = $file->getClientOriginalName();
                    $imagepath = time() . '_' . $name;
                    $file->move(public_path('asset/images/product/'), $imagepath);
                    $product_image['image'] = $imagepath;
                    ProductImage::create($product_image);
                }
            }else{
                throw new \Exception("Image failure");
            }
            DB::commit();
            return to_route('vendor.product.index')->with('success', 'Product Updated Successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to create product. Please try again.');
        }
        return Redirect::back();
    }
    public function edit(Product $product)
    {
        $categories = Category::get();
        $subcategories = Subcategory::where('category_id', $product->category_id)->get();
        return view('vendor.product.edit', compact('categories', 'subcategories', 'product'));
    }
    public function update(ProductPostRequest $request, ProductImagePostRequest $imgrequest, Product $product)
    {
        try {
            $validator = $request->validated();
            $validator['slug'] = Str::slug($request->name);
            $validator['trending'] = $request['trending'] ? 1 : 0;

            $product->update($validator);
            try {
                $product_image = $imgrequest->validated();
                if ($imgrequest->hasFile('image')) {
                    $files = $imgrequest->file('image');
                    foreach ($files as $key => $file) {
                        if ($key === 0 && $product->allImage->isEmpty()) {
                            $product_image['is_main'] = 1;
                        }
                        $product_image['product_id'] = $product['id'];
                        $name = $file->getClientOriginalName();
                        $imagepath = time() . '_' . $name;
                        File::delete(public_path('asset/images/product/' . $imagepath));
                        $file->move(public_path('asset/images/product/'), $imagepath);
                        $product_image['image'] = $imagepath;
                        ProductImage::create($product_image);
                    }
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
                return redirect()->back()->with('error', 'Failed to store image. Please try again.');
            }
            return to_route('vendor.product.index')->with('success', 'Product Created successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to create product. Please try again.');
        }
        return Redirect::back();
    }
    public function destroy(Product $product)
    {
        try {
            if ($product) {
                $images = ProductImage::where('product_id', $product->id)->get();
                foreach ($images as $image) {
                    File::delete(public_path('asset/images/product/' . $image->image));
                }
                $product->delete();
                return response()->json(['status' => 200, 'message' => 'Product deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Product not found'], 404);
        }
    }
    public function bulkDelete(Request $request)
    {
        try {
            $products = $request->input('id');
            $product = Product::whereIn('id', $products);
            if ($product->delete()) {
                echo 'Data Deleted';
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Product not found'], 404);
        }
    }
}

