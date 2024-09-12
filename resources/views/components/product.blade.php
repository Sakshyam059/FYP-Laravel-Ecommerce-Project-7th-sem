@props(['product' => []])
<a href="{{ route('product.show', $product->id) }}" class="relative border-transparent group swiper-slide">
    <h4 class="absolute px-3 py-2 text-xs font-medium bg-yellow-400">
        <span>{{ number_format($product->discount_value, 0) }}</span>% off
    </h4>
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
            <span class="text-yellow-400">
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star"></i>
            </span>
            <span>(0)</span>
        </li>
    </ul>

</a>
