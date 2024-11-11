@extends('frontend.includes.main')

@section('content')
    <section class="px-6 overflow-hidden" id="banners">
        @if ($banners->isNotEmpty())
        <x-banner-carousel :hero="$banners" />
            
        @endif
    </section>
    <x-vendor-list />

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

    
    <x-promotion-banner-list />

    @include('frontend.page.partials.features')
@endsection
