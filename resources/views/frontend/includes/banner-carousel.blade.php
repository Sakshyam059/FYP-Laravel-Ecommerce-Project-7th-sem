<link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet" />
<div x-data="{ swiper: null }" x-init="swiper = new Swiper($refs.container, {
    loop: true,
    pagination: {
        el: '.swiper-pagination',
         clickable: true,
    },
    slidesPerView: 1,
    spaceBetween: 30,
    autoplay: {
        delay: 7000,
    }
})">


    <div class="relative overflow-hidden rounded shadow-sm swiper-container " x-ref="container">
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($banners as $banner)
                <div class=" swiper-slide">
                    <div class="flex flex-col overflow-hidden border">
                        <div class="flex-shrink-0">
                            <img class=" banner-image" src="{{ asset('admin/images/banners/' . $banner->image) }}"
                                alt="">
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
        <div class="absolute bottom-0 swiper-pagination"></div>
    </div>

</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
