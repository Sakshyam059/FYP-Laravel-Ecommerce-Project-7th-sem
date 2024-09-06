<aside class="p-4 space-y-4 border rounded h-fit">
    <div>
        <h5 class="text-xl font-medium">Shipping Address</h5>
    </div>
    <form action="{{route('shipping.create')}}" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-2">
                <label for="" class="block font-medium">Address</label>
                <input type="text" value="{{session()->get('shipping_detail')['address']??old('address')}}"  name="address" class="w-full border-gray-400 rounded bg-gray-50">
            </div>
            <div class="space-y-2">
                <label for="" class="block font-medium">City</label>
                <input type="text" value="{{session()->get('shipping_detail')['city']??old('city')}}" name="city" class="w-full border-gray-400 rounded bg-gray-50">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 ">
            <div class="space-y-2">
                <label for="" class="block font-medium">Zip Code</label>
                <input type="text" value="{{session()->get('shipping_detail')['zipcode']??old('zipcode')}}" name="zipcode" class="w-full border-gray-400 rounded bg-gray-50">
            </div>
            <div class="space-y-2">
                <label for="" class="block font-medium">State</label>
                <select name="state" id="" class="w-full border-gray-400 rounded bg-gray-50">
                    <option selected disabled>Choose your state</option>
                    <option value="ktm">Kathmandu</option>
                    <option value="bht">Bharatpur</option>
                    <option value="pok">Pokhara</option>
                </select>
            </div>
        </div>
        <div>
            <button type="submit" class="px-12 py-2 text-white bg-blue-700 rounded">Save</button>
        </div>
    </form>


</aside>
