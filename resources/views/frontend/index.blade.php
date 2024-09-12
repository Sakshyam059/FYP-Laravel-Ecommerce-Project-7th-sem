@extends('frontend.includes.main')
@section('title')
    Khelretail
@endsection
@section('content')
    <section class="px-6 overflow-hidden" id="banners">
        <x-banner-carousel :hero="$banners" />
    </section>
    <x-vendor-list />
    <x-promotion-banner-list />

    <section class="px-6 py-4 space-y-6">
        @foreach ($deals as $deal)
            <div class="overflow-hidden">
                <x-product-carousel :products="$deal->productDeals" :deal="$deal">
                    {{ $deal->deal_name }}
                </x-product-carousel>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const endDate = new Date('{{ $deal->end_date }}').getTime();

                        function updateCountdown(elementId) {
                            const now = new Date().getTime();
                            const distance = endDate - now;

                            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                            document.getElementById(elementId).innerHTML =
                                days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

                            if (distance < 0) {
                                clearInterval(countdownFunction);
                                document.getElementById(elementId).innerHTML = "EXPIRED";
                            }
                        }

                        const countdownFunction = setInterval(() => updateCountdown('countdown-{{ $deal->id }}'), 1000);
                    });
                </script>
            </div>
        @endforeach

    </section>
    <section class="p-6 mt-4">
        <div class="grid gap-2 mx-auto lg:grid-cols-3">
            <div class="relative overflow-hidden h-44">
                <img class="object-cover w-full rounded h-44"
                    src="{{ asset('frontend/assets/static/images/banners/banner-1.jpg') }}" alt="">

                <div class="absolute top-0 bottom-0 left-0 right-0 px-3 pt-12 space-y-3 rounded bg-gray-700/90">
                    <h5 class="text-2xl font-bold text-white ">New clothing collection</h5>
                    <button class="px-3 py-2 text-sm text-white bg-green-500 rounded">Shop Now</button>
                </div>
            </div>

            <div class="relative overflow-hidden h-44">
                <img class="object-cover w-full rounded h-44"
                    src="{{ asset('frontend/assets/static/images/banners/banner-2.jpg') }}" alt="">

                <div class="absolute top-0 bottom-0 left-0 right-0 px-3 pt-12 space-y-3 rounded bg-gray-700/90">
                    <h5 class="text-2xl font-bold text-white ">New clothing collection</h5>
                    <button class="px-3 py-2 text-sm text-white bg-green-500 rounded">Shop Now</button>
                </div>
            </div>
            <div class="relative overflow-hidden h-44">
                <img class="object-cover w-full rounded h-44"
                    src="{{ asset('frontend/assets/static/images/banners/banner-3.jpg') }}" alt="">

                <div class="absolute top-0 bottom-0 left-0 right-0 px-3 pt-12 space-y-3 rounded bg-gray-700/90">
                    <h5 class="text-2xl font-bold text-white ">New clothing collection</h5>
                    <button class="px-3 py-2 text-sm text-white bg-green-500 rounded">Shop Now</button>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.page.partials.features')
@endsection
