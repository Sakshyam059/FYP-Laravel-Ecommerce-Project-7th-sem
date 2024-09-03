<link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet" />
<div x-data="{ swiper: null }" x-init="swiper = new Swiper($refs.container, {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    autoplay: {
        delay: 3000,
    },

    breakpoints: {
        640: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 0,
        },
        1024: {
            slidesPerView: 5,
            spaceBetween: 10,
        },
    },
})" class="space-y-4">
    <div class="relative flex items-center">
        <h3 class="text-2xl font-semibold ">Our new products</h3>
        <div class="absolute right-0 z-10 flex items-center gap-2">
            <button @click="swiper.slidePrev()"
                class="flex items-center justify-center p-2 bg-white border rounded-full focus:outline-none">
                <i class='bx bx-left-arrow-alt'></i>
            </button>
            <button @click="swiper.slideNext()"
                class="flex items-center justify-center p-2 bg-white border rounded-full focus:outline-none">
                <i class='bx bx-right-arrow-alt'></i>
            </button>
        </div>
    </div>

    <div class="swiper-container" x-ref="container">
        <div class=" swiper-wrapper">
            <!-- Slides -->
            @foreach ($products as $product)
                <x-product :product="$product" />
                <x-product :product="$product" />
            @endforeach
        </div>
    </div>

</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
