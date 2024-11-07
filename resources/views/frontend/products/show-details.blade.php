@extends('frontend.includes.main')
<style>
    .description ul li {
        padding: 0.5rem 0;
    }
</style>
@section('content')
    <ul class="flex gap-2 px-6 py-3 -mt-2 text-sm font-medium text-green-700 border-b">
        <li class="flex items-center gap-2">
            <i class="bx bx-home"></i>
            <span>Home</span>
        </li>
        <li><small>></small></li>
        <li><span>Product</li>
        <li><small>></small></li>

        <li>{{ $product->slug }}</li>
    </ul>
    <div class="px-6 ">
        <div class="py-4">
            <div class="grid grid-cols-2 gap-6">
                <x-product-image-swiper :images="$product->allImage" />

                <div>
                    <div class="pb-2 space-y-2">
                        <h2 class="text-2xl font-semibold">{{ $product->name }}</h2>
                        <small class="text-blue-600">{{ $product->category->category_name }}</small>
                        <div>
                            <span>
                                @for ($i = 1; $i <= 5; $i++)
                                    <span
                                        class="star text-3xl {{ $i <= $product->averageRating() ? 'text-yellow-400' : 'text-gray-400' }}">
                                        @if ($i == ceil($product->averageRating()) && $product->averageRating() - floor($product->averageRating()) > 0)
                                            &#9734;
                                        @else
                                            &#9733;
                                        @endif
                                    </span>
                                @endfor
                            </span>
                        </div>
                    </div>
                    <div class="py-2 space-y-4 ">
                        <p>{{ $product->short_description }}</p>
                        <p class="text-xl font-medium"> <span> NPR
                                {{ $product->discount_price() }} </span>
                            <span class="text-sm text-gray-400 line-through">NPR {{ $product->price }}</span>
                            <span class="text-sm text-red-500 "> ({{ intval($product->discount_value) }}% off) </span>
                        </p>
                    </div>

                    <div>

                        <form action="{{ route('cart.add') }}" method="post" class="space-y-4">
                            @csrf
                            <div class="flex justify-between">
                                <div class="flex-1 space-y-2">
                                    <h4 class="text-lg font-medium text-gray-800">Sizes:</h4>
                                    @foreach ($product->product_skus as $sku)
                                        <input class="sr-only peer" type="radio" name="size"
                                            value="{{ $sku->size->id }}" id="size-{{ $sku->size->id }}" required>
                                        <label for="size-{{ $sku->size->id }}"
                                            class="inline-block px-3 py-1 overflow-hidden text-center border border-gray-400 rounded-md peer-checked:bg-yellow-300 ">{{ $sku->size->size_name }}</label>
                                    @endforeach
                                </div>
                                <div class="flex-1 space-y-2">
                                    <h4 class="text-lg font-medium text-gray-800">Colors:</h4>
                                    @foreach ($product->product_skus as $sku)
                                        <input class="sr-only peer" type="radio" name="color"
                                            value="{{ $sku->color->id }}" id="color-{{ $sku->color->id }}" required>
                                        <label for="color-{{ $sku->color->id }}"
                                            class="block w-8 h-8 border border-gray-400 rounded-full peer-checked:border-2 peer-checked:border-gray-800"
                                            style="background-color: {{ $sku->color->color_name }};"></label>
                                    @endforeach
                                </div>
                            </div>
                            <div x-data="{ currentVal: 1, minVal: 0, maxVal: 10, decimalPoints: 0, incrementAmount: 1 }" class="flex flex-col gap-2">

                                <label for="counterInput" class="text-lg font-medium dark:text-neutral-300">Quantity</label>
                                <div @dblclick.prevent class="flex items-center">
                                    <button type="button"
                                        @click="currentVal = Math.max(minVal, currentVal - incrementAmount)"
                                        class="flex items-center justify-center h-10 px-4 py-2 border rounded-l-md border-neutral-300 bg-neutral-50 text-neutral-600 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-white"
                                        aria-label="subtract">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                            stroke="currentColor" fill="none" stroke-width="2" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                        </svg>
                                    </button>
                                    <input x-model="currentVal.toFixed(decimalPoints)" name="quantity" id="counterInput"
                                        type="text"
                                        class="w-20 h-10 text-center rounded-none border-x-none border-y border-neutral-300 bg-neutral-50/50 text-neutral-900 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-black dark:border-neutral-700 dark:bg-neutral-900/50 dark:text-white dark:focus-visible:outline-white"
                                        readonly />
                                    <button type="button"
                                        @click="currentVal = Math.min(maxVal, currentVal + incrementAmount)"
                                        class="flex items-center justify-center h-10 px-4 py-2 border rounded-r-md border-neutral-300 bg-neutral-50 text-neutral-600 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-white"
                                        aria-label="add">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                            stroke="currentColor" fill="none" stroke-width="2" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <input class="hidden" type="text" value="{{ $product->id }}" name="product_id" readonly>
                            @if ($product->product_skus->sum('quantity') > 5)
                                <button type="submit" class="px-20 py-3 text-lg text-white bg-green-400 border rounded "
                                    href="{{ route('cart.add', $product->id) }}">
                                    <i class="bx bx-cart"></i>
                                    <span>Add to Cart</span></button>
                            @else
                                <p class="my-4 font-bold text-red-600">Out of stocks</p>
                            @endif
                        </form>
                    </div>

                </div>

                <div class="col-span-2 py-4" x-data="{
                    openDescription: false,
                    openReview: true,
                    toggle() {
                        this.openDescription = !this.openDescription;
                        this.openReview = !this.openReview;
                    }
                }">
                    <div class="relative flex ">
                        <button type="button" @click="toggle()"
                            class="z-10 px-2 pb-2 text-lg font-semibold duration-300 ease-linear border-b-2"
                            :class="openDescription ? 'text-blue-600 border-b-2 border-blue-600' :
                                'hover:text-blue-600 '">Description</button>
                        <button type="button" @click="toggle()"
                            class="z-10 px-2 pb-2 text-lg font-semibold duration-300 ease-linear border-b-2 "
                            :class="openReview ? 'text-blue-600 border-b-2 border-blue-600' :
                                'hover:text-blue-600 '">Ratings
                            &amp; Reviews</button>
                        <div class="absolute bottom-0 w-full h-[2px] bg-gray-200"></div>
                    </div>
                    <div x-show="openDescription" class="py-2 space-y-2 text-sm font-normal leading-6 description">
                        {!! $product->description !!}
                    </div>
                    <div x-show="openReview" class="py-4 space-y-2 text-sm font-normal leading-6 description">
                        <div class="flex justify-between">
                            <div class="space-y-2">
                                <h3 class="text-xl font-medium">Average Rating</h3>
                                <div class="space-x-2">
                                    <span>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span
                                                class="star text-3xl {{ $i <= $product->averageRating() ? 'text-yellow-400' : 'text-gray-400' }}">
                                                @if ($i == ceil($product->averageRating()) && $product->averageRating() - floor($product->averageRating()) > 0)
                                                    &#9734;
                                                @else
                                                    &#9733;
                                                @endif
                                            </span>
                                        @endfor
                                    </span>

                                </div>
                            </div>
                        </div>
                        @include('frontend.products.reviews.list')
                        @include('frontend.products.reviews.create')
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="p-6 mt-2 ">
        <x-slider :products="$product->category->products->take(6)">Recommendations</x-slider>
    </div>
@endsection
