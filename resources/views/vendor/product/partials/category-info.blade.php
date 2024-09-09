<div class="px-5 py-3 space-y-2 border rounded ">
    <h5 class="space-y-2 font-semibold">Product Category</h2>
        <div class="flex items-center justify-between gap-12">
            <label class="" for="category">Category Suggestions</label>
            <div class="w-2/3" id="product-category">
                <select name="category_id" class="w-full rounded" id="category">
                    <option selected  value="0">Choose a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id === $product->category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="flex items-center justify-between gap-12">
            <label class="" for="category">Category <strong class="text-red-600">*</strong></label>
            <input type="text" name="category_name" value="Default" class="w-2/3 border-gray-400 rounded bg-gray-50">
        </div>

        <div class="flex items-center justify-between gap-12">
            <label class="block " for="subcategory">Subcategory Suggestions</label>
            <div  class="w-2/3 subcategory">
                <select class="w-full rounded " name="subcategory_id" id="subcategory">
                    <option selected  value="0">Choose a subcategory</option>
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
        <div class="flex items-center justify-between gap-12">

            <label class="block " for="category">Subcategory <strong class="text-red-600">*</strong></label>
            <input type="text" value="Default" name="subcategory_name" class="w-2/3 border-gray-400 rounded bg-gray-50">
        </div>


</div>
