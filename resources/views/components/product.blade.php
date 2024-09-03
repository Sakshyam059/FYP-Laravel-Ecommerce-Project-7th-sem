@props(['product'=>[]])
<div class="relative border swiper-slide">
    <h4 class="absolute px-3 py-2 text-xs font-medium bg-yellow-400">
        <span>{{number_format($product->discount_value,0)}}</span>% off
    </h4>
    <div>
        <a href="{{route('product.show',$product->id)}}">
            <img class="object-cover h-56 p-6 mx-auto"
            src="{{ asset('admin/images/product/' . $product->mainImage->image) }}" alt="">
        </a>
    </div>
    <div class="px-3 space-y-2">
        <small class="text-xs text-gray-400">{{$product->category->category_name}}</small>
        <h4 class="font-semibold">{{ $product->name }}</h4>
        <h4 class="text-sm text-green-600">{{$product->brand->brand_name}}</h4>
    </div>
    
    <div class="flex items-center justify-between px-3 my-3">
        <h4 class="inline-flex flex-col gap-2 font-medium"><span class="text-orange-600">NPR {{ number_format($product->price-($product->price/$product->discount_value),2) }}</span> <span class="text-xs text-red-600 line-through">NPR {{ $product->price }}</span></h4>
        <form action="{{route('cart.add')}}" method="post">
            @csrf
            <input class="hidden" type="text" value="{{$product->id}}" name="product_id" readonly>
            <button type="submit" class="inline-flex items-center text-xs gap-2 p-2.5 border rounded-md">
                <i class="bx bx-cart"></i>
                <span>Add</span>
            </button>
        </form>
    </div>

</div>