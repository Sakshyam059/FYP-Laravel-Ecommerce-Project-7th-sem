<footer class="mt-4 bg-white border-t " id="footer">
    <div class="px-6 py-4">
        <div class="grid grid-cols-2 gap-6 lg:grid-cols-4">
            <div class="">
                <h3 class="text-2xl font-semibold">{{$siteSetting->name??'Khelretail'}}</h3>
                <div class="my-3 space-y-3">
                    <p><i class="fa fa-phone"></i>Telephone: +977 {{$siteSetting->phone}}</p>
                    <p><i class="fa fa-envelope-o"></i>Email: {{$siteSetting->email}}</p>
                </div>
            </div>

            <div class="">
                <h3 class="text-lg font-semibold">Information</h3>
                <ul class="px-0 menu">
                    <li class="py-2"><a title="My Account">About us</a></li>
                    <li class="py-2"><a title="My Cart">Contact us</a></li>
                    <li class="py-2"><a title="Wishlist">Faq</a></li>
                    <li class="py-2"><a title="Wishlist">Privacy policy</a></li>
                </ul>
            </div>
            <div class="">
                <h3 class="text-lg font-semibold">Shopping</h3>
                <ul class="px-0 menu">
                    <li class="py-2"><a title="My Account">Products</a></li>
                    <li class="py-2"><a title="My Cart">My orders</a></li>
                    <li class="py-2"><a title="My Cart">My Cart</a></li>
                    <li class="py-2"><a title="Wishlist">Blog</a></li>
                </ul>
            </div>
            <div class="">
                <h3 class="text-lg font-semibold">Quick Links</h3>
                <ul class="px-0 menu">
                    <li class="py-2"><a title="About">Return & Exchange</a></li>
                    <li class="py-2">
                        <a href="#" title="Terms & Conditions">Shipping Policy</a>
                    </li>
                    <li class="py-2">
                        <a href="#" title="Terms & Conditions">Terms & Conditions</a>
                    </li>
                    <li class="py-2"><a title="About">Privacy policy</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="px-6 border-t">
       
        <div class="py-2 ">
            <p>Copyright &copy; <span id="date"></span> by Khelretail</p>
            {{-- <script>
                    document.getElementById("date").innerHTML =
                        new Date().getFullYear();
                </script> --}}
        </div>

    </div>
</footer>
