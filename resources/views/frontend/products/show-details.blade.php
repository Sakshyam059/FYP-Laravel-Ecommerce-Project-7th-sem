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
                    <div class="py-2 space-y-4 ">
                        <p>{{ $product->short_description }}</p>
                        <p class="text-xl font-medium"> <span> NPR
                                {{ $product->discount_price() }} </span>
                            <span class="text-sm text-gray-400 line-through">NPR {{ $product->price }}</span>
                            <span class="text-sm text-red-500 "> ({{ intval($product->discount_value) }}% off) </span>
                        </p>             
                    </div>
                  
                    <div>
                        
                        <form action="{{route('cart.add')}}" method="post" class="space-y-4">
                            @csrf
                            <div class="flex justify-between">
                                <div class="flex-1 space-y-2">
                                    <h4 class="text-lg font-medium text-gray-800">Sizes:</h4>
                                    @foreach ($product->product_skus as $sku)
                                    <input class="sr-only peer" type="radio" name="size" value="{{$sku->size->id}}" id="size-{{$sku->size->id}}" >
                                        <label for="size-{{$sku->size->id}}"
                                            class="inline-block px-3 py-1 overflow-hidden text-center border border-gray-400 rounded-md peer-checked:bg-yellow-300 ">{{ $sku->size->size_name }}</label>
                                        
                                    @endforeach
                                </div>
                                <div class="flex-1 space-y-2">
                                    <h4 class="text-lg font-medium text-gray-800">Colors:</h4>
                                    @foreach ($product->product_skus as $sku)
                                    <input class="sr-only peer" type="radio" name="color" value="{{$sku->color->id}}" id="color-{{$sku->color->id}}" >
                                        <label for="color-{{$sku->color->id}}" class="block w-8 h-8 border border-gray-400 rounded-full peer-checked:border-2 peer-checked:border-gray-800"
                                            style="background-color: {{ $sku->color->color_name }};"></label>
                                    @endforeach
                                </div>
                            </div>
                            <div x-data="{ currentVal: 1, minVal: 0, maxVal: 10, decimalPoints: 0, incrementAmount: 1 }" class="flex flex-col gap-2">
    
                                <label for="counterInput" class="text-lg font-medium dark:text-neutral-300">Quantity</label>
                                <div @dblclick.prevent class="flex items-center">
                                    <button type="button" @click="currentVal = Math.max(minVal, currentVal - incrementAmount)"
                                        class="flex items-center justify-center h-10 px-4 py-2 border rounded-l-md border-neutral-300 bg-neutral-50 text-neutral-600 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-white"
                                        aria-label="subtract">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                            stroke="currentColor" fill="none" stroke-width="2" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                        </svg>
                                    </button>
                                    <input x-model="currentVal.toFixed(decimalPoints)"  name="quantity" id="counterInput" type="text"
                                        class="w-20 h-10 text-center rounded-none border-x-none border-y border-neutral-300 bg-neutral-50/50 text-neutral-900 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-black dark:border-neutral-700 dark:bg-neutral-900/50 dark:text-white dark:focus-visible:outline-white"
                                        readonly />
                                    <button type="button" @click="currentVal = Math.min(maxVal, currentVal + incrementAmount)"
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

                            <input class="hidden" type="text" value="{{$product->id}}" name="product_id" readonly>
                            <button type="submit" class="px-20 py-3 text-lg text-white bg-green-400 border rounded "
                                href="{{ route('cart.add', $product->id) }}">
                                <i class="bx bx-cart"></i>
                                <span>Add to Cart</span></button>
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
                    <div class="relative flex gap-2">
                        <button type="button" @click="toggle()"
                            class="z-10 px-2 pb-2 text-lg font-semibold duration-300 ease-linear border-b-2"
                            :class="openDescription ? 'text-blue-600 border-b-2 border-blue-600' :
                                'hover:text-blue-600 hover:border-blue-600'">Description</button>
                        <button type="button" @click="toggle()"
                            class="z-10 px-2 pb-2 text-lg font-semibold duration-300 ease-linear border-b-2 "
                            :class="openReview ? 'text-blue-600 border-b-2 border-blue-600' :
                                'hover:text-blue-600 hover:border-blue-600'">Ratings
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
                                    <span class="text-xl font-medium">4.5</span>
                                    <span class="text-yellow-400">
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="py-4 space-y-2">
                            <div class="flex justify-between gap-6">
                                <div>
                                    <img class="object-cover w-12 h-12 rounded-full"
                                        src="{{ asset('frontend/assets/static/images/profile-2.jpg') }}" alt="">
                                </div>
                                <div class="grid w-full grid-cols-2">
                                    <div class="flex items-center gap-4">
                                        <div>
                                            <span class="text-yellow-400">
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                            </span>
                                            <h4 class="text-lg font-medium">Manish Sharma</h4>
                                        </div>
                                    </div>
                                    <p class="text-right">Aug 2020</p>
                                    <div class="col-span-2 py-2">
                                        <h4 class="text-base font-medium">Best Product</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A libero reprehenderit
                                            sed minus
                                            veritatis soluta facilis quidem obcaecati repellendus qui tempore impedit veniam
                                            deleniti eum placeat aliquid, possimus sunt iste.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <h3 class="text-xl font-medium">Add a Review</h3>
                            <form action="" method="POST" class="space-y-4">
                                @csrf
                                <div class="">
                                    <input type="text" placeholder="Title"
                                        class="w-full px-4 border-gray-200 rounded bg-gray-50">
                                </div>
                                <div class="">
                                    <textarea placeholder="Enter your comment and reviews" class="w-full px-4 border-gray-200 rounded bg-gray-50"></textarea>
                                </div>
                                <div class="float-right">
                                    <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded">Send
                                        Review</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
