<aside class="p-4 space-y-4 border rounded h-fit">
    <div>
        <h5 class="text-xl font-medium">Shipping Address</h5>
    </div>
    <form action="{{ route('shipping.create') }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="space-y-2">
                <label for="address" class="block font-medium">Address</label>
                <input type="text" id="address" name="address" value="{{ session()->get('shipping_detail')['address'] ?? old('address') }}" class="w-full border-gray-400 rounded bg-gray-50">
            </div>
            <div class="space-y-2">
                <label for="city" class="block font-medium">City</label>
                <input type="text" id="city" name="city" value="{{ session()->get('shipping_detail')['city'] ?? old('city') }}" class="w-full border-gray-400 rounded bg-gray-50">
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="space-y-2">
                <label for="zipcode" class="block font-medium">Zip Code</label>
                <input type="number" minlength="6"  maxlength="6" id="zipcode" name="zipcode" value="{{ session()->get('shipping_detail')['zipcode'] ?? old('zipcode') }}" class="w-full border-gray-400 rounded bg-gray-50">
            </div>
            {{-- {{dd(session()->get('shipping_detail');)}} --}}
            <div class="space-y-2">
                <label for="state" class="block font-medium">State</label>
                <select name="state" id="state" class="w-full border-gray-400 rounded bg-gray-50">
                    <option value="" disabled selected>Choose your state</option>
                    <option value="gandaki" {{(session()->get('shipping_detail')['state']??'')=='gandaki'?'selected':''}}>Gandaki</option>
                    <option value="bagmati" {{(session()->get('shipping_detail')['state']??'')=='bagmati'?'selected':''}}>Bagmati</option>
                    <option value="lumbini" {{(session()->get('shipping_detail')['state']??'')=='lumbini'?'selected':''}}>Lumbini</option>
                </select>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="px-6 py-2 text-white bg-blue-700 rounded">Save</button>
        </div>
    </form>
</aside>
