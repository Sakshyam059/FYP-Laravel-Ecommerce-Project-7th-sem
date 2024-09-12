<link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet" />

@props(['images' => []])
<div class="relative" x-data="{ swiper: null }" x-init="swiper = new Swiper($refs.container, {
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.custom-button-next',
        prevEl: '.custom-button-prev',
    },
    slidesPerView: 1,
    spaceBetween: 30,
    autoplay: {
        delay: 7000,
    }
})">



    <div class="absolute left-0 right-0 z-10 flex justify-between -translate-y-1/2 top-1/2">
        <button class="flex items-center justify-center px-2 py-4 border focus:outline-none custom-button-prev">
            <i class='bx bx-left-arrow-alt'></i>
        </button>
        <button class="flex items-center justify-center px-2 py-4 border focus:outline-none custom-button-next">
            <i class='bx bx-right-arrow-alt'></i>
        </button>
    </div>
    <div class="overflow-hidden rounded shadow-sm swiper-container" x-ref="container">
        <div class=" swiper-wrapper">
            <!-- Slides -->

            @foreach ($images as $product)
                <div class=" swiper-slide h-80">


                    <img class="w-full rounded h-80" src="{{ asset('asset/images/product/' . $product->image) }}"
                        alt="">


                </div>
            @endforeach
            <div class="swiper-pagination">
            
            </div>
        </div>
    </div>

</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
