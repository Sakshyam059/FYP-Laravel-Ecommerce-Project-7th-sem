
<aside class="px-6 mb-3 border-r">
    <h4 class="text-2xl font-bold ">Filters</h4>
    <ul class="py-3">
        <li>
            <button
                class="inline-flex items-center justify-between w-full py-2 font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-200"
                @click="toggleAvailabilityMenu" aria-haspopup="true">
                    <span>Availability</span>
            
                <svg class="w-4 h-4 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <template x-if="isAvailabilityMenuOpen">
                <div x-transition:enter="transition-all ease-in-out duration-300"
                    x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                    x-transition:leave="transition-all ease-in-out duration-300"
                    x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                    class="space-y-2 overflow-hidden text-sm font-medium text-gray-800  rounded-b-md dark:text-gray-400 dark:bg-gray-900"
                    aria-label="submenu">
                    
                    <div
                        class="flex items-center gap-2 px-2 py-2 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <input type="checkbox" class="" >
                        <label for="">In stock</label>

                    </div>
                    <div
                        class="flex items-center gap-2 px-2 py-2 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <input type="checkbox" class="" >
                        <label for="">Out of stock</label>

                    </div>
                    
            
               
            </template>
        </li>
        <li>
            <button
                class="inline-flex items-center justify-between w-full py-2 font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-200"
                @click="toggleCategoryMenu" aria-haspopup="true">
                    <span>Category</span>
            
                <svg class="w-4 h-4 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
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
                    class="space-y-2 overflow-hidden text-sm font-medium text-gray-800  rounded-b-md dark:text-gray-400 dark:bg-gray-900"
                    aria-label="submenu">
                    @foreach (App\Models\Category::all() as $category)
                    <div
                        class="py-2 {{ Request::routeIs('admin.product.index')?'border border-black/50 bg-blue-300/75  dark:bg-gray-700 ':''}} px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a href="{{route('admin.product.index')}}" class="block" href="pages/login.html">{{$category->category_name}}</a>
                    </div>
                    @endforeach
                    
            
               
            </template>
        </li>
        <li>
            <button
                class="inline-flex items-center justify-between w-full py-2 font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-200"
                @click="toggleTagsMenu" aria-haspopup="true">
                    <span>Tags</span>
            
                <svg class="w-4 h-4 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <template x-if="isTagsMenuOpen">
                <div x-transition:enter="transition-all ease-in-out duration-300"
                    x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                    x-transition:leave="transition-all ease-in-out duration-300"
                    x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                    class="space-y-2 overflow-hidden text-sm font-medium text-gray-800  rounded-b-md dark:text-gray-400 dark:bg-gray-900"
                    aria-label="submenu">
                    @foreach (App\Models\Category::all() as $category)
                    <div
                        class="py-2 {{ Request::routeIs('admin.product.index')?'border border-black/50 bg-blue-300/75  dark:bg-gray-700 ':''}} px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a href="{{route('admin.product.index')}}" class="block" href="pages/login.html">{{$category->category_name}}</a>
                    </div>
                    @endforeach
                    
            
               
            </template>
        </li>
      
        
        
    </ul>
</aside>