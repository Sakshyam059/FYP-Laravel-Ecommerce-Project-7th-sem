<aside class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto text-sm bg-white border-r dark:bg-gray-800 md:block">
    <div class="text-gray-500 dark:text-gray-400">
        <div class="py-5 ">
            <a href="{{ route('homepage') }}" class="ml-6 text-2xl font-bold text-gray-800 dark:text-gray-200"
                href="#">
                Khelretail
            </a>
        </div>
        <ul class="px-3 space-y-2">
            <li class="text-xs font-bold uppercase">Menu</li>
            <li>
                <a class="{{ Request::routeIs('admin.dashboard') ? 'border border-black/50 text-white bg-blue-800/75 dark:bg-gray-700 ' : '' }} p-2 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200"
                    href="{{ route('admin.dashboard') }}">
                    <i class=' bx bxs-dashboard'></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <button
                    class="{{ Request::routeIs('admin.vendor.*') ? 'border border-black/50 bg-blue-800/75 text-white  dark:bg-gray-700 ' : '' }}relative p-2 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200"
                    @click="toggleVendorMenu" aria-haspopup="true">

                    <i class='bx bx-store-alt'></i>
                    <span>Vendor</span>

                    <svg class="absolute w-4 h-4 right-3 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isVendorMenuOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="py-2 overflow-hidden font-medium text-gray-800 rounded-b-md dark:text-gray-400 "
                        aria-label="submenu">


                        <li
                            class="{{ Request::routeIs('admin.vendor.request') ? 'border border-black/50 bg-blue-300/75 dark:bg-gray-700 ' : '' }} py-2 px-6 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200">
                            <a href="{{ route('admin.vendor.request') }}">
                                Vendor Request
                            </a>
                        </li>

                        <li
                            class="{{ Request::routeIs('admin.vendor.index') ? 'border border-black/50 bg-blue-300/75 dark:bg-gray-700 ' : '' }} py-2 px-6 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200">
                            <a href="{{ route('admin.vendor.index') }}">
                                Vendor List
                            </a>
                        </li>
                        
                </template>
            </li>

            <li>
                <button
                    class="{{ Request::routeIs('admin.product.*') ? 'border border-black/50 bg-blue-800/75 text-white  dark:bg-gray-700 ' : '' }}relative p-2 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200"
                    @click="togglePagesMenu" aria-haspopup="true">
                    <i class='bx bx-shopping-bag'></i>
                    <span>Products</span>

                    <svg class="absolute w-4 h-4 right-3 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesMenuOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="py-2 overflow-hidden font-medium text-gray-800 rounded-b-md dark:text-gray-400 "
                        aria-label="submenu">
                        <li
                            class="{{ Request::routeIs('admin.product.index') ? 'border border-black/50 bg-blue-300/75  dark:bg-gray-700 ' : '' }} py-2 px-6 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200">
                            <a href="{{ route('admin.product.index') }}" href="pages/login.html">Product List</a>
                        </li>
                        <li
                            class="{{ Request::routeIs('admin.product.category.*') ? 'border border-black/50 bg-blue-300/75 dark:bg-gray-700 ' : '' }} py-2 px-6 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200">
                            <a href="{{ route('admin.product.category.index') }}">
                                Categories
                            </a>
                        </li>
                        <li
                            class="{{ Request::routeIs('admin.product.subcategory.*') ? 'border border-black/50 bg-blue-300/75 dark:bg-gray-700 ' : '' }} py-2 px-6 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200">
                            <a href="{{ route('admin.product.subcategory.index') }}">
                                Subcategories
                            </a>
                        </li>
                        <li
                            class="{{ Request::routeIs('admin.product.color.*') ? 'border border-black/50 bg-blue-300/75 dark:bg-gray-700 ' : '' }} py-2 px-6 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200">
                            <a href="{{ route('admin.product.color.index') }}">
                                Colors
                            </a>
                        </li>
                        <li
                            class="{{ Request::routeIs('admin.product.size.*') ? 'border border-black/50 bg-blue-300/75 dark:bg-gray-700 ' : '' }} py-2 px-6 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200">
                            <a href="{{ route('admin.product.size.index') }}">
                                Sizes
                            </a>
                        </li>
                        <li
                            class="{{ Request::routeIs('admin.product.brand.*') ? 'border border-black/50 bg-blue-300/75 dark:bg-gray-700 ' : '' }} py-2 px-6 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200">
                            <a href="{{ route('admin.product.brand.index') }}">
                                Brands
                            </a>
                        </li>
                </template>
            </li>
            <li>
                <button
                    class="{{ Request::routeIs('admin.promotion.*') ? 'border border-black/50 bg-blue-800/75 text-white  dark:bg-gray-700 ' : '' }}relative p-2 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200"
                    @click="togglePromotionMenu" aria-haspopup="true">

                    <i class='bx bx-layer'></i>
                    <span>Promotions</span>

                    <svg class="absolute w-4 h-4 right-3 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPromotionMenuOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="py-2 overflow-hidden font-medium text-gray-800 rounded-b-md dark:text-gray-400 "
                        aria-label="submenu">

                        <li
                            class="{{ Request::routeIs('admin.promotion.banner.*') ? 'border border-black/50 bg-blue-400/75 dark:bg-gray-700 ' : '' }} py-2 px-6 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200">
                            <a href="{{ route('admin.promotion.banner.index') }}" href="pages/forgot-password.html">
                                Banners
                            </a>
                        </li>
                        <li
                            class="{{ Request::routeIs('admin.promotion.deals.*') ? 'border border-black/50 bg-blue-400/75 dark:bg-gray-700 ' : '' }} py-2 px-6 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200">
                            <a href="{{ route('admin.promotion.deals.index') }}" href="pages/forgot-password.html">
                                Deals
                            </a>
                        </li>



                </template>
            </li>
            <li>
                <a class="inline-flex items-center w-full gap-2 p-2 font-semibold text-gray-800 transition-colors duration-150 border border-none rounded hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-200"
                    href="{{ route('admin.dashboard') }}">
                    <i class='bx bx-credit-card'></i>
                    <span>Payment</span>
                </a>
            </li>
            <li>
                <a class="{{ Request::routeIs('admin.order.index') ? 'border border-black/50 text-white bg-blue-800/75 dark:bg-gray-700 ' : '' }} p-2 inline-flex gap-2 items-center w-full rounded border-none   font-semibold  transition-colors duration-150 border  hover:text-gray-800 dark:hover:text-gray-200 text-gray-800 dark:text-gray-200"
                    href="{{ route('admin.order.index') }}">
                    <i class='bx bx-cart-alt'></i>
                    <span>Orders</span>
                </a>
            </li>
            <li>
                <a class="inline-flex items-center w-full gap-2 p-2 font-semibold text-gray-800 transition-colors duration-150 border border-none rounded hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-200"
                    href="{{ route('admin.dashboard') }}">
                    <i class='bx bx-star'></i>
                    <span>Review</span>
                </a>
            </li>
            <li>
                <a class="inline-flex items-center w-full gap-2 p-2 font-semibold text-gray-800 transition-colors duration-150 border border-none rounded hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-200"
                    href="{{ route('admin.dashboard') }}">
                    <i class='bx bx-detail'></i>
                    <span>Blogs</span>
                </a>
            </li>
            <li>
                <a class="inline-flex items-center w-full gap-2 p-2 font-semibold text-gray-800 transition-colors duration-150 border border-none rounded hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-200"
                    href="{{ route('admin.newsletter.index') }}">
                    <i class='bx bx-news'></i>
                    <span>Newsletter</span>
                </a>
            </li>
            <li>
                <a class="{{ Request::routeIs('admin.site_setting.edit') ? 'border border-black/50 text-white bg-blue-800/75 dark:bg-gray-700 ' : '' }} inline-flex items-center w-full gap-2 p-2 font-semibold text-gray-800 transition-colors duration-150 border border-none rounded hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-200"
                    href="{{ route('admin.site_setting.edit') }}">
                    <i class='bx bx-globe'></i>
                    <span>Website</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.profile.edit') }}"
                    class="{{ Request::routeIs('admin.profile.edit') ? 'border border-black/50 text-white bg-blue-800/75 dark:bg-gray-700 ' : '' }} inline-flex items-center w-full gap-2 p-2 font-semibold text-gray-800 transition-colors duration-150 border border-none rounded hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-200"
                    href="{{ route('admin.dashboard') }}">
                    <i class='bx bx-user-circle'></i>
                    <span>Account</span>
                </a>
            </li>
            <li>
                <a class="{{ Request::routeIs('admin.profile.edit') ? 'border border-black/50 text-white bg-blue-800/75 dark:bg-gray-700 ' : '' }} inline-flex items-center w-full gap-2 p-2 font-semibold text-gray-800 transition-colors duration-150 border border-none rounded hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-200"
                    href="{{ route('admin.dashboard') }}">
                    <i class='bx bx-help-circle'></i>
                    <span>Help</span>
                </a>
            </li>

        </ul>
        {{-- <div class="px-6 my-6">
            <button
                class="flex items-center justify-between w-full px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Create account
                <span class="ml-2" aria-hidden="true">+</span>
            </button>
        </div> --}}
    </div>
</aside>
<!-- Mobile sidebar -->
<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
    x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-gray-800 ont-bold dark:text-gray-200" href="#">
            Windmill
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                <a class="inline-flex items-center w-full font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    href="index.html">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>


            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="forms.html">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span>Forms</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="cards.html">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    <span>Cards</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="charts.html">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                        <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                    </svg>
                    <span>Charts</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="buttons.html">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122">
                        </path>
                    </svg>
                    <span>Buttons</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="modals.html">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span>Modals</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="tables.html">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span>Tables</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <button
                    class="inline-flex items-center justify-between w-full font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="togglePagesMenu" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                            </path>
                        </svg>
                        <span>Pages</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesMenuOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="pages/login.html">Login</a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full">
                                Create account
                            </a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="pages/forgot-password.html">
                                Forgot password
                            </a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="pages/404.html">404</a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="pages/blank.html">Blank</a>
                        </li>

                </template>
            </li>

            <div class="px-6 my-6">
                <button
                    class="flex items-center justify-between px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Create account
                    <span class="ml-2" aria-hidden="true">+</span>
                </button>
            </div>
    </div>
</aside>
