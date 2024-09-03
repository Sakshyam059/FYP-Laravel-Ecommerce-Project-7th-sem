<div class="px-5 py-3 mt-3 border rounded ">
    <h5 class="mb-3 font-semibold">Product Category</h2>
        <div class="mb-3">
            <label class="inline-block pb-3" for="category">Category<strong class="text-red-600">*</strong></label>
            <div id="product-category">
                <select name="category_id" class="w-full rounded " id="category">
                    <option selected disabled>Choose a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id === $product->category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="">
            <label class="inline-block pb-3" for="subcategory">Subcategory<strong class="text-red-600">*</strong></label>
            <div class="subcategory">
                <select class="w-full rounded " name="subcategory_id" id="subcategory">
                    <option selected disabled>Choose a subcategory</option>
                    @if (!empty($subcategories))
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}"
                                {{ $subcategory->id === $product->subcategory_id ? 'selected' : '' }}>
                                {{ $subcategory->subcategory_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

</div>
