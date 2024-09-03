@extends('frontend.includes.main')
<style>
    .description ul li{
        padding: 0.5rem 0;
    }
</style>
@section('content')
    <div class="px-6 ">
        <ul class="flex gap-2 text-lg font-semibold text-gray-700">
            <li>Home</li>
            <li>></li>
            <li><span>Product</li>
            <li>></li>
            <li>{{ $product->id }}</li>
        </ul>
        <div class="py-4">
            <div class="grid grid-cols-2 gap-6">
                <div class="">
                    @foreach ($product->allImage as $path)
                        <div class="p-3 border rounded">
                            <img class="mx-auto h-80 aspect-square" src="{{ asset('admin/images/product/' . $path->image) }}"
                                alt="">
                        </div>
                    @endforeach
                </div>
                <div>
                    <div class="pb-2 space-y-2">
                        <h2 class="text-4xl font-semibold">{{ $product->name }}</h2>
                        <div class="text-yellow-400">
                            <span>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                            </span>
                        </div>
                    </div>
                    <div class="row-span-2 py-2 space-y-4">
                        <p>{{$product->short_description}}</p>
                        <p class="text-2xl font-medium">NPR {{ $product->price }}</p>
                        <h4 class="text-lg font-medium text-gray-800">Available Sizes</h4>
                        <div class="flex gap-2">
                            @foreach ($product->product_skus as $sku)
                                <label
                                    class="block px-4 py-2 text-sm capitalize border border-gray-800 rounded">{{ $sku->size->size_name }}</label>
                            @endforeach
                        </div>
                        <h4 class="text-lg font-medium text-gray-800">Available Colors</h4>
                        <div class="flex gap-2">
                            @foreach ($product->product_skus as $sku)
                                <label class="block w-8 h-8 border border-gray-800 rounded-full"
                                    style="background-color: {{ $sku->color->color_name }};"></label>
                            @endforeach
                        </div>
                    </div>
                  
                </div>
                
                <div class="py-4" x-data="{openDescription:true,openReview:false,toggle() { this.openDescription = ! this.openDescription; this.openReview = ! this.openReview;   } }">
                    <div class="relative flex gap-2">
                        <button type="button" @click="toggle()"  class="z-10 px-2 pb-2 text-lg font-semibold duration-300 ease-linear border-b-2" :class="openDescription?'text-blue-600 border-b-2 border-blue-600':'hover:text-blue-600 hover:border-blue-600'">Description</button>
                        <button type="button" @click="toggle()" class="z-10 px-2 pb-2 text-lg font-semibold duration-300 ease-linear border-b-2 " :class="openReview?'text-blue-600 border-b-2 border-blue-600':'hover:text-blue-600 hover:border-blue-600'">Ratings &amp; Reviews</button>
                        <div class="absolute bottom-0 w-full h-[2px] bg-gray-200"></div>
                    </div>
                    <div x-show="openDescription" class="py-2 space-y-2 text-sm font-normal leading-6 description" >
                        {!! $product->description !!} 
                    </div>
                    <div x-show="openReview" class="py-2 space-y-2 text-sm font-normal leading-6 description" >
                        Reviews
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection
