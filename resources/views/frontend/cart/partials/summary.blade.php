<aside class="space-y-4">
    <div>
        <h2 class="text-xl font-medium">Order Summary</h2>
    </div>
    <div class="">
        <ul class="space-y-4">
            <li class="flex justify-between"><span>Subtotal</span> <span>NPR
                    {{ $user->cart->subtotal ??session()->get('order')['subtotal']??0 }}</span></li>
            <li class="flex justify-between"><span>Shipping</span> <span>NPR 10</span></li>
            <li class="flex justify-between py-4 border-t"><span>Total Amount</span> <span>NPR 100</span></li>
        </ul>
    </div>

</aside>
