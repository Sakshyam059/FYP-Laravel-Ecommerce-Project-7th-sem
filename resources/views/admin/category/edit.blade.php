@extends('admin.includes.main')
@section('content')
    <div class="px-3">
        <div class="py-2 my-2 font-medium text-stone-500">
            <a href="{{ route('admin.product.category.index') }}" class="">
                Home
            </a>
            <span>/</span>
            <a href="{{ route('admin.product.category.index') }}" class="">
                Category
            </a>
            <span>/</span>
            <a href="{{ route('admin.product.category.index') }}" class="">
                Edit
            </a>
        </div>
        <h2 class="py-3 text-2xl font-semibold">Edit Category</h2>

        <form action="{{ route('admin.product.category.update', $category->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="py-2 space-y-2">
                <label class="block font-semibold">Category name</label>
                <input type="text" name="category_name" value="{{ $category->category_name }}"
                    placeholder="Enter category name"
                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                @error('category_name')
                    <span class="text-xs text-red-600 ">{{ $message }}</span>
                @enderror
            </div>
            <div class="py-2 space-y-2">
                <label class="block font-semibold">Description</label>
                <textarea class="w-full rounded" name="description" id="" rows="3">{{ $category->description }}</textarea>
                @error('description')
                    <span class="text-xs text-red-600 ">{{ $message }}</span>
                @enderror
            </div>
            <div class="py-2 space-y-2">
                <label class="block font-semibold">Thumbnail Image</label>
                <div class="flex items-center gap-3">
                    <img class="object-contain w-24 h-24 p-3 border rounded" 
                    src="{{ asset('admin/images/category/' . $category->thumbnail_image) }}" id="preview" alt="" />
                <label for="thumbnail_image" class="inline-flex items-center gap-1 px-4 py-2 text-sm text-white bg-gray-800 border rounded">
                    <i class='bx bx-image-alt'></i>
                    <span>Change</span>
                </label>
                </div>
                <input class="hidden" type="file" onchange="previewFile()" name="thumbnail_image" id="thumbnail_image">
                @error('thumbnail_image')
                    <span class="text-xs text-red-600 ">{{ $message }}</span>
                @enderror
            </div>
            <div class="py-2 space-y-2">
                <label class="block font-semibold">Status</label>
                <select
                    class="block w-full text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                    name="status" id="">
                    <option value="1" {{ $category->status === 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $category->status === 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="py-2">
                <button type="submit" class="px-6 py-2 text-white bg-green-600 rounded-md">Update</button>
            </div>
        </form>

    </div>
@endsection
@push('script')
    <script>
        $(document).ready(() => {
            const photoInp = $("#thumbnail_image");
            let file;
            photoInp.change(function (e) {
                file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $("#preview")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush
