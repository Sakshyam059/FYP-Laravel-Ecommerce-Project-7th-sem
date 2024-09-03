@extends('admin.includes.main')
@section('content')
    <div class="px-3">
        <div class="py-2 my-2 font-medium text-stone-500">
            <a href="{{ route('admin.product.size.index') }}" class="">
                Home
            </a>
            <span>/</span>
            <a href="{{ route('admin.product.size.index') }}" class="">
                size
            </a>
            <span>/</span>
            <a href="{{ route('admin.product.size.index') }}" class="">
                Edit
            </a>
        </div>
        <h2 class="py-3 text-2xl font-semibold">Edit size</h2>
        <form action="{{ route('admin.product.size.update', $size->id) }}" method="post" >
            @csrf
            @method('PUT')

            <div class="py-2 space-y-2">
                <label class="block font-semibold">Size name</label>
                <input type="text" name="size_name" value="{{ $size->size_name }}"
                placeholder="Enter size name" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                @error('size_name')
                <span class="text-xs text-red-600 " >{{$message}}</span>

                @enderror
            </div>
            
            <div class="py-2 space-y-2">
                <label class="block font-semibold">Status</label>
                <select class="block w-full text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" name="status" id="">
                    <option value="1" {{ $size->status === 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $size->status === 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="py-2">
                <button type="submit" class="px-6 py-2 text-white bg-green-600 rounded-md">Update</button>
            </div>
        </form>
    </div>
@endsection
