<section class="grid grid-cols-4 gap-2 px-6 py-4">
    @foreach (App\Models\Banner::where('banner_type', 'hero')->get() as $banner)
        <div>
            <img class="w-full max-h-36" src="{{ asset('asset/images/banners/' . $banner->image) }}"
                alt="">
        </div>
        <div>
            <img class="w-full max-h-36" src="{{ asset('asset/images/banners/' . $banner->image) }}"
                alt="">
        </div>
        
        <div>
            <img class="w-full max-h-36" src="{{ asset('asset/images/banners/' . $banner->image) }}"
                alt="">
        </div>
        <div>
            <img class="w-full max-h-36" src="{{ asset('asset/images/banners/' . $banner->image) }}"
                alt="">
        </div>
    @endforeach
</section>
