<div class="px-5 py-3 mt-3 border rounded bg-gray-50/25">
    <h5 class="font-semibold ">Pricing</h2>

        <div class="py-3 space-y-3">

            <div class="">
                <label class="inline-block pb-3 " for="price">Product Price<strong class="text-danger">*</strong>
                </label>
                <input type="text" value="{{ old('price', $product->price) }}" class="w-full rounded bg-gray-100/40"
                    name="price">
            </div>
            <div>
                <label class="inline-block pb-3 " for="discount">Product Discount <small class="text-gray-400">(Optional)</small>
                </label>
                <input type="text" value="{{ old('discount_value', $product->discount_value) }}"
                    class="w-full rounded bg-gray-100/40" name="discount_value">
            </div>
            <div>
                <label class="inline-block pb-3 " for="discount">Discount Type <small class="text-gray-400">(Optional)</small>
                </label>
                <input type="text" value="{{ old('discount_type', $product->discount_type) }}"
                    class="w-full rounded bg-gray-100/40" name="discount_type">
            </div>
        </div>

</div>
