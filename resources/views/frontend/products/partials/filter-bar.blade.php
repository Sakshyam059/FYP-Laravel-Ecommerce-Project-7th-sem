<aside x-data="{ isAvailabilityMenuOpen: true, isCategoryMenuOpen: true, isBrandsMenuOpen: true }" class="hidden px-6 py-4 mb-3 border-r lg:block">
    <h4 class="text-2xl font-bold">Filters</h4>

    <form action="{{ route('products.index') }}" method="get">
        <ul class="py-3">
            {{-- <li>
                    <button type="button"
                        class="inline-flex items-center justify-between w-full py-2 font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800"
                        @click="isAvailabilityMenuOpen = !isAvailabilityMenuOpen" aria-haspopup="true">
                        <span>Availability</span>
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <template x-if="isAvailabilityMenuOpen">
                        <div x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                             x-transition:leave="transition-all ease-in-out duration-300" x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                             class="space-y-2 overflow-hidden text-sm font-medium text-gray-800 rounded-b-md dark:text-gray-400 dark:bg-gray-900" aria-label="submenu">
                            <div class="flex items-center gap-2 px-2 py-2">
                                <input type="checkbox">
                                <label for="" class="capitalize">In stock</label>
                            </div>
                            <div class="flex items-center gap-2 px-2 py-2">
                                <input type="checkbox">
                                <label for="" class="capitalize">Out of stock</label>
                            </div>
                        </div>
                    </template>
                </li> --}}
            <li>
                <button type="button"
                    class="inline-flex items-center justify-between w-full py-2 font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800"
                    @click="isCategoryMenuOpen = !isCategoryMenuOpen" aria-haspopup="true">
                    <span>Category</span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isCategoryMenuOpen">
                    <div x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="space-y-2 overflow-hidden text-sm font-medium text-gray-800 rounded-b-md dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">
                        @foreach (\App\Models\Category::has('products')->get() as $category)
                            <div class="flex items-center gap-2 px-2 py-2 transition-colors duration-150 hover:text-gray-800">
                                <input type="checkbox" class="rounded" name="categories[]" value="{{ $category->slug }}"
                                    {{ in_array($category->slug, request('categories', [])) ? 'checked' : '' }}>
                                <label for="" class="capitalize">{{ $category->category_name }}</label>
                                {{-- <a href="{{ route('product.category-filter', $category->slug) }}" class="block">{{ $category->category_name }}</a> --}}
                            </div>
                        @endforeach
                    </div>
                </template>
            </li>
            <li>
                <button type="button"
                    class="inline-flex items-center justify-between w-full py-2 font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800"
                    @click="isBrandsMenuOpen = !isBrandsMenuOpen" aria-haspopup="true">
                    <span>Prices</span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isBrandsMenuOpen">
                    <div x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="space-y-2 overflow-hidden text-sm font-medium text-gray-800 rounded-b-md dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">

                        <div class="flex justify-between gap-2 px-2 py-2 transition-colors duration-150 hover:text-gray-800">
                            <input type="number" class="w-1/2 text-xs rounded" value="{{request('min_price'??'')}}" name="min_price" min="0" placeholder="Min">
                            <input type="number" class="w-1/2 text-xs rounded" value="{{request('max_price'??'')}}" name="max_price" max="9999" placeholder="Max">
                        </div>
                    </div>
                </template>
            </li>
            <li>
                <button type="button"
                    class="inline-flex items-center justify-between w-full py-2 font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800"
                    @click="isBrandsMenuOpen = !isBrandsMenuOpen" aria-haspopup="true">
                    <span>Brand</span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isBrandsMenuOpen">
                    <div x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="space-y-2 overflow-hidden text-sm font-medium text-gray-800 rounded-b-md dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">
                        @foreach (\App\Models\Brand::all() as $brand)
                            <div class="flex items-center gap-2 px-2 py-2 transition-colors duration-150 hover:text-gray-800">
                                <input type="checkbox" class="rounded" name="brands[]" value="{{ $brand->slug }}"
                                    {{ in_array($brand->slug, request('brands', [])) ? 'checked' : '' }}>
                                <label for="" class="capitalize">{{ $brand->brand_name }}</label>
                            </div>
                        @endforeach
                    </div>
                </template>
            </li>
            {{-- <li>
                    <button type="button"
                        class="inline-flex items-center justify-between w-full py-2 font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800"
                        @click="isTagsMenuOpen = !isTagsMenuOpen" aria-haspopup="true">
                        <span>Tags</span>
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <template x-if="isTagsMenuOpen">
                        <div x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                             x-transition:leave="transition-all ease-in-out duration-300" x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                             class="space-y-2 overflow-hidden text-sm font-medium text-gray-800 rounded-b-md dark:text-gray-400 dark:bg-gray-900" aria-label="submenu">
                       @foreach (\App\Models\Tag::all() as $tag)
                            <div class="px-2 py-2 transition-colors duration-150 hover:text-gray-800">
                                <a href="{{ route('admin.product.index') }}" class="block">{{ $tag->tag_name }}</a>
                            </div>
                            @endforeach
                        </div>
                    </template>
                </li> --}}
            <li class="mt-4">
                <button type="submit" class="px-4 py-2 text-xs text-white bg-blue-600 rounded">Apply Filter</button>
            </li>
        </ul>
    </form>
</aside>
