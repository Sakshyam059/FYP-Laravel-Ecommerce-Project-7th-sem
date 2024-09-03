@extends('admin.includes.main')
@section('content')
    <div class="px-3">
        <div class="py-2 my-2 font-medium text-stone-500">
            <a href="{{ route('admin.product.color.index') }}" class="">
                Home
            </a>
            <span>/</span>
            <a href="{{ route('admin.product.color.index') }}" class="">
                Color
            </a>
            <span>/</span>
            <a href="{{ route('admin.product.color.index') }}" class="">
                Edit
            </a>
        </div>
        <h2 class="py-3 text-2xl font-semibold">Edit Color</h2>
        <form action="{{ route('admin.product.color.update', $color->id) }}" method="post" >
            @csrf
            @method('PUT')

            <div class="py-2 space-y-2">
                <label class="block font-semibold">Color name</label>
                <input type="text" name="color_name" value="{{ $color->color_name }}"
                placeholder="Enter color name" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                @error('color_name')
                <span class="text-xs text-red-600 " >{{$message}}</span>

                @enderror
            </div>
            
            <div class="py-2 space-y-2">
                <label class="block font-semibold">Status</label>
                <select class="block w-full text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" name="status" id="">
                    <option value="1" {{ $color->status === 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $color->status === 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="py-2">
                <button type="submit" class="px-6 py-2 text-white bg-green-600 rounded-md">Update</button>
            </div>
        </form>
    </div>
@endsection
