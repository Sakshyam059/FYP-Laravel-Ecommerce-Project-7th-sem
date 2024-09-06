<div class="px-5 py-3 mt-3 border rounded bg-gray-50/25">
  
    <h5 class="mb-3 font-semibold">Brand</h2>

    <div >
        <label class="block pb-3" for="quantity">Brand<strong class="text-danger">*</strong>
        </label>
        <select name="brand_id" id="" class="w-full rounded ">
            <option selected disabled>Select a brand</option>
            @foreach (App\Models\Brand::all() as $brand)
            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
            @endforeach
        </select>
    </div>
</div>
