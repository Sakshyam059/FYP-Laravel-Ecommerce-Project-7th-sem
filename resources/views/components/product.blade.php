@props(['product' => []])
<a href="{{ route('product.show', $product->id) }}" class="relative border swiper-slide">
    <h4 class="absolute px-3 py-2 text-xs font-medium bg-yellow-400">
        <span>{{ number_format($product->discount_value, 0) }}</span>% off
    </h4>
    <div>
        <img class="object-cover h-56 mx-auto" src="{{ asset('admin/images/product/' . $product->mainImage->image) }}"
            alt="">
    </div>
    <ul class="p-2 space-y-2">
        <li class="font-medium">{{ $product->name }}</li>
        
        <li class="text-orange-600">Rs.{{ number_format($product->discount_price(), 2) }}</li>
        <li class="flex gap-2 text-sm">
            <span class="text-gray-400 line-through ">NPR {{ $product->price }}</span>
            <span>{{ $product->discount_value }}% off</span>
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
