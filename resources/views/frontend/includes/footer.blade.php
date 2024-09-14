<footer class="mt-4 bg-white border-t" id="footer">
    <div class="px-6 py-4">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Contact Information -->
            <div class="space-y-3">
                <h3 class="text-2xl font-semibold">{{$siteSetting->name ?? 'Khelretail'}}</h3>
                <div class="my-3 space-y-3">
                    <p><i class="fa fa-phone"></i> Telephone: +977 {{$siteSetting->phone}}</p>
                    <p><i class="fa fa-envelope-o"></i> Email: {{$siteSetting->email}}</p>
                </div>
            </div>

            <!-- Information Links -->
            <div>
                <h3 class="text-lg font-semibold">Information</h3>
                <ul class="px-0 space-y-2 menu">
                    <li><a class="block py-2" title="My Account">About us</a></li>
                    <li><a class="block py-2" title="My Cart">Contact us</a></li>
                    <li><a class="block py-2" title="Wishlist">Faq</a></li>
                    <li><a class="block py-2" href="{{route('privacy-policy')}}" title="Privacy-Policy">Privacy policy</a></li>
                </ul>
            </div>

            <!-- Shopping Links -->
            <div>
                <h3 class="text-lg font-semibold">Shopping</h3>
                <ul class="px-0 space-y-2 menu">
                    <li><a class="block py-2" title="My Account">Products</a></li>
                    <li><a class="block py-2" title="My Cart">My orders</a></li>
                    <li><a class="block py-2" title="My Cart">My Cart</a></li>
                    <li><a class="block py-2" title="Wishlist">Blog</a></li>
                </ul>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold">Quick Links</h3>
                <ul class="px-0 space-y-2 menu">
                    <li><a class="block py-2" title="About">Return & Exchange</a></li>
                    <li><a class="block py-2" href="#" title="Terms & Conditions">Shipping Policy</a></li>
                    <li><a class="block py-2" href="#" title="Terms & Conditions">Terms & Conditions</a></li>
                    <li><a class="block py-2" href="{{route('privacy-policy')}}" title="Privacy-Policy">Privacy policy</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="px-6 border-t">
        <div class="py-2 text-center">
            <p>Copyright &copy; <span id="date"></span> by Khelretail</p>
            <script>
                document.getElementById("date").innerHTML = new Date().getFullYear();
            </script>
        </div>
    </div>
</footer>
