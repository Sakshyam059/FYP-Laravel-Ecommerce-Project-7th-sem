@extends('frontend.includes.main')
@section('content')
    <section class="flex items-center justify-between gap-16 px-6">
        <div class="w-full space-y-4">
            <h2 class="text-3xl font-bold">About Us</h2>
            <p class="text-sm text-justify text-gray-600">Welcome to Khelretail, your go-to for premium sports gear and apparel. We offer top-quality products for athletes of all levels, including high-performance sneakers, workout equipment, and stylish activewear. Shop with confidence and join a community that values innovation and excellence. Elevate your game with us!</p>   
        </div>
        <div class="flex items-center justify-between w-full gap-4">
            <div class="w-full ">
                <img src="{{asset('frontend/assets/static/images/about/product-2.jpg')}}" class="w-full mx-auto rounded h-80 " alt="">
            </div>
            <div class="w-full space-y-4 ">
                <img src="{{asset('frontend/assets/static/images/about/product-1.jpg')}}" class="w-full mx-auto rounded h-72" alt="">
                <img src="{{asset('frontend/assets/static/images/about/product-3.jpg')}}" class="w-full mx-auto rounded aspect-square " alt="">
            </div>
        </div>
    </section>
    <section class="px-6 my-4">
        <div class="flex justify-around gap-4 text-justify">
            <div class="p-4 space-y-4 border rounded shadow-sm shadow-black/40">
                <h4 class="text-lg font-semibold">25,000+ Happy Customer</h4>
                <p class="text-sm text-gray-600">Customer happiness goes beyond customer satisfaction by creating an emotional connection with a brand's.</p>
            </div>
            <div class="p-4 space-y-4 border rounded shadow-sm shadow-black/40">
                <h4 class="text-lg font-semibold">6+ Years of Experiences</h4>
            <p class="text-sm text-gray-600">The years of experience you list on your resume represent the work experience you have if you have little experience.</p>  
            </div>
            <div class="p-4 space-y-4 border rounded shadow-sm shadow-black/40">
                <h4 class="text-lg font-semibold">Easy Shipments</h4>
                <p class="text-sm text-gray-600">The years of experience you list on your resume represent the work experience you have if you have little experience.</p>  
            </div>
        </div>
    </section>
    <section class="px-6 my-4 space-y-6">
        <h2 class="text-3xl font-bold text-center">Our Team Members</h2>
        <div class="flex justify-around gap-16">
           
            <div class="p-4 space-y-4 text-center border rounded">
                <img src="{{asset('frontend/assets/static/images/profile-2.jpg')}}" class="w-56 aspect-square" alt="">
                <h4 class="text-lg font-semibold">XYZ</h4>
                <small>Web Developer</small>
            </div>
           
            <div class="p-4 space-y-4 text-center border rounded">
                <img src="{{asset('frontend/assets/static/images/profile-2.jpg')}}" class="w-56 aspect-square" alt="">
                <h4 class="text-lg font-semibold">XYZ</h4>
                <small>Web Developer</small>
            </div>
            <div class="p-4 space-y-4 text-center border rounded">
                <img src="{{asset('frontend/assets/static/images/profile-2.jpg')}}" class="w-56 aspect-square" alt="">
                <h4 class="text-lg font-semibold">XYZ</h4>
                <small>Web Developer</small>
            </div>
        </div>
    </section>
    @include('frontend.page.partials.features')
@endsection