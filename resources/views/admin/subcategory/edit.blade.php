@extends('admin.includes.main')
@section('content')
    <div class="px-3">
        <div class="py-2 my-2 font-medium text-stone-500">
            <a href="{{ route('admin.product.category.index') }}" class="">
                Home
            </a>
            <span>/</span>
            <a href="{{ route('admin.product.subcategory.index') }}" class="">
                Subcategory
            </a>
            <span>/</span>
            <a href="{{ route('admin.product.category.index') }}" class="">
                Edit
            </a>
        </div>
        <h2 class="py-3 text-2xl font-semibold">Edit Subcategory</h2>
        <form action="{{ route('admin.product.subcategory.update', $subcategory->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="py-2 space-y-2">
                <label class="block font-semibold">Subcategory name</label>
                <input type="text" name="subcategory_name" value="{{ $subcategory->subcategory_name }}"
                    placeholder="Enter subcategory name"
                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                @error('subcategory_name')
                    <span class="text-xs text-red-600 ">{{ $message }}</span>
                @enderror
            </div>
            <div class="py-2 space-y-2">
                <label class="block font-semibold" for="">Category</label>
                <select
                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                    name="category_id" id="">
                    <option selected disabled>Choose a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id === $subcategory->category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-xs text-red-600 ">{{ $message }}</span>
                @enderror
            </div>
            <div class="py-2 space-y-2">
                <label class="block font-semibold">Description</label>
                <textarea
                    class="block w-full text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                    name="description" id="" rows="3">{{ $subcategory->description }}</textarea>
                @error('description')
                    <span class="text-xs text-red-600 ">{{ $message }}</span>
                @enderror
            </div>

            <div class="py-2 space-y-2">
                <label class="block font-semibold">Status</label>
                <select
                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                    name="status" id="">
                    <option value="1" {{ $subcategory->status === 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $subcategory->status === 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="py-2">
                <button type="submit" class="px-6 py-2 text-white bg-green-600 rounded-md">Update</button>
            </div>
        </form>

    </div>
@endsection
