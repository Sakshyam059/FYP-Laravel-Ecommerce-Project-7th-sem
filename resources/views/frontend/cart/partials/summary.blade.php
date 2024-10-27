<aside class="p-4 space-y-4 border rounded bg-gray-50">
    <div>
        <h2 class="text-xl font-semibold">Order Summary</h2>
    </div>
    <div>
        <ul class="space-y-4">
            <li class="flex justify-between text-sm md:text-base">
                <span>Subtotal</span>
                <span>NPR {{ number_format($user->cart->subtotal ?? session()->get('order')['subtotal'] ?? 0, 2) }}</span>
            </li>
            <li class="flex justify-between text-sm md:text-base">
                <span>Shipping</span>
                <span>NPR 0</span>
            </li>
            <li class="flex justify-between py-4 text-sm border-t md:text-base">
                <span>Total Amount</span>
                <span class="text-lg font-semibold md:text-xl">NPR {{ number_format($user->cart->subtotal ?? session()->get('order')['subtotal'] ?? 0, 2) }}</span>
            </li>
        </ul>
    </div>
</aside>
