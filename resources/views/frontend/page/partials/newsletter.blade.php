<section class="p-6 bg-gray-50">
    <div class="grid gap-6 py-6 rounded lg:grid-cols-2 place-items-center">
        <div class="space-y-4 text-center text-gray-800">
            <h3 class="text-2xl font-bold uppercase">Newsletter</h3>
            <h5 class="text-2xl font-bold text-orange-600">
                Subscribe & Get 10% Off
            </h5>
            <p class="px-6 text-lg text-gray-500 ">Get E-mail updates about our latest shop and special offers.
            </p>
        </div>
        <form method="POST" class="w-11/12 ml-auto ">
            @csrf
            <div class="flex items-center w-full gap-2">
                <input type="text" placeholder="Enter Your Email" class="w-full rounded-md"
                    title="Sign up for our newsletter" id="newsletter" name="email" />
                <button class="px-4 py-2 text-white bg-blue-500 rounded shadow-sm" title="Subscribe" type="submit">
                    Subscribe
                </button>
            </div>
        </form>
    </div>
</section>