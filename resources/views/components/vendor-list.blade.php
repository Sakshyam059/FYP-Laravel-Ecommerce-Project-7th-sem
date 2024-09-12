<section class="px-6 py-4 space-y-4">
    <h3 class="text-2xl font-semibold ">Explore Vendors</h3>
    <div class="grid grid-cols-2 gap-3 lg:grid-cols-6 lg:gap-6 ">
        @foreach (App\Models\Vendor::all() as $vendor)
            @if ($vendor->user->status === 1)
                <div class="p-4 text-white border rounded-md bg-gray-100/90">
                    <img class="w-16 h-16 mx-auto aspect-square"
                        src="{{ asset('asset/images/vendor/logo/' . $vendor->logo) }}" alt="">
                </div>
            @endif
        @endforeach
    </div>
</section>
