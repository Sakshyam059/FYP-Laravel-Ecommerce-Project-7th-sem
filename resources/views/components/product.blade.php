@props(['product' => []])
<a href="{{ route('product.show', $product->id) }}" class="relative border-transparent group swiper-slide">
    <h4 class="absolute px-3 py-2 text-xs font-medium bg-yellow-400">
        <span>{{ number_format($product->discount_value, 0) }}</span>% off
    </h4>
    <div class="product-card">
        <div class="border-2 bg-gray-50/50 group-hover:border-orange-400">
            <img class="w-full h-56" src="{{ asset('asset/images/product/' . $product->mainImage->image) }}"
                alt="">
        </div>
        <ul class="p-2 space-y-2">
            <li class="font-medium">{{ $product->name }}</li>
            <li class="flex items-center gap-2">
                <span class="font-medium text-orange-600">Rs.{{ number_format($product->discount_price(), 2) }}</span>
                <small class="text-gray-400 line-through ">Rs. {{ $product->price }}</small>     
            </li>
            <li class="text-sm">
                <span>
                    @for ($i = 1; $i <= 5; $i++)
                        <span
                            class="star text-xl {{ $i <= $product->averageRating() ? 'text-yellow-400' : 'text-gray-400' }}">
                            @if ($i == ceil($product->averageRating()) && $product->averageRating() - floor($product->averageRating()) > 0)
                                &#9734;
                            @else
                                &#9733;
                            @endif
                        </span>
                    @endfor
                </span>
            </li>
        </ul>
    
    </div>
</a>
