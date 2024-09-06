@extends('frontend.includes.main')
@section('title')
    Khelretail
@endsection
@section('content')
    <section class="px-6 overflow-hidden" id="banners">
        @include('frontend.includes.banner-carousel')
    </section>
    <section class="px-6 py-4 space-y-4">
        <h3 class="text-2xl font-semibold ">Explore Categories</h3>
        <div class="grid grid-cols-2 gap-3 lg:grid-cols-6 lg:gap-6 ">
            @foreach (App\Models\Category::all() as $category)
                <div class="py-3 border rounded-md ">
                    <a href="{{ route('product.category-filter', $category->slug) }}">
                        <img class="w-16 p-2 mx-auto lg:p-3 aspect-square lg:w-28" width="100%" height="110px"
                            src="{{ asset('admin/images/category/' . $category->thumbnail_image) }}" alt="">
                    </a>
                    <div class="lg:mt-3">
                        <h6 class="text-center">{{ $category->category_name }}</h6>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <section class="px-6 py-4">
        <div class="overflow-hidden">
            @include('frontend.includes.product-carousel')
        </div>
    </section>
    <section class="p-6 mt-4">
        <div class="grid gap-2 mx-auto lg:grid-cols-3">
            <div class="relative overflow-hidden h-44">
                <img class="object-cover w-full rounded h-44"
                    src="{{asset('frontend/assets/static/images/banners/banner-1.jpg')}}"
                    alt="">

                <div class="absolute top-0 bottom-0 left-0 right-0 px-3 pt-12 space-y-3 rounded bg-gray-700/90">
                    <h5 class="text-2xl font-bold text-white ">New clothing collection</h5>
                    <button class="px-3 py-2 text-sm text-white bg-green-500 rounded">Shop Now</button>
                </div>
            </div>

            <div class="relative overflow-hidden h-44">
                <img class="object-cover w-full rounded h-44"
                    src="{{asset('frontend/assets/static/images/banners/banner-2.jpg')}}"
                    alt="">

                <div class="absolute top-0 bottom-0 left-0 right-0 px-3 pt-12 space-y-3 rounded bg-gray-700/90">
                    <h5 class="text-2xl font-bold text-white ">New clothing collection</h5>
                    <button class="px-3 py-2 text-sm text-white bg-green-500 rounded">Shop Now</button>
                </div>
            </div>
            <div class="relative overflow-hidden h-44">
                <img class="object-cover w-full rounded h-44"
                    src="{{asset('frontend/assets/static/images/banners/banner-3.jpg')}}"
                    alt="">

                <div class="absolute top-0 bottom-0 left-0 right-0 px-3 pt-12 space-y-3 rounded bg-gray-700/90">
                    <h5 class="text-2xl font-bold text-white ">New clothing collection</h5>
                    <button class="px-3 py-2 text-sm text-white bg-green-500 rounded">Shop Now</button>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.page.partials.newsletter')
    @include('frontend.page.partials.features')
@endsection
