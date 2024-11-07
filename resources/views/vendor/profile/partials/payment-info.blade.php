<div class="space-y-4 ">
    <h2 class='text-xl font-semibold '>Payment Methods</h2>

    <div class="flex items-center gap-6">
        <label>Payment Methods:</label>
        <div class="flex items-center gap-4">
            @foreach (App\Models\PaymentMethod::all() as $method)
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="payment_methods[{{ $method->id }}][checked]" required class="rounded">
                    <label for="">{{ $method->method_name }}</label>
                </div>
            @endforeach
        </div>

    </div>
    @foreach (App\Models\PaymentMethod::where('method_type', 1)->get() as $method)
        <div class="flex items-center justify-between gap-6">
            <label for="">For {{ $method->method_name }}</label>
            <input name="payment_methods[{{ $method->id }}][key]" type="text" placeholder="Enter API Key"
                class="w-2/3 rounded bg-gray-50">
        </div>
    @endforeach

</div>
