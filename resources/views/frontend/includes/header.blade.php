<div x-data="{ cartOpen: false, isOpen: false, userDropdown: false, categoryMenuDropdown: false, navOpen: false }">
    <header>
        <!-- Header section -->
        <div class="relative z-50 flex items-center justify-between px-6 py-3 bg-white">
            <!-- Menu Button -->
            <div class="sm:hidden">
                <button @click="isOpen = !isOpen" type="button"
                    class="absolute z-10 top-4 left-4 hover:text-gray-500 focus:outline-none" aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path fill-rule="evenodd"
                            d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Logo-->
            <a href="{{ route('homepage') }}" class="mx-auto font-bold text-slate-800 lg:text-3xl lg:mx-0">
                Khelretail
            </a>

            <!-- Search Bar -->
            <div class="relative hidden w-1/2 mx-auto lg:block text-stone-600">
                <span class="absolute inset-y-0 right-0 flex items-center px-3 rounded-r">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <input type="text" id="search" class="w-full pl-4 pr-16 border border-gray-200 rounded focus:ring-0"
                    placeholder="Search">
                <ul id="results" class="absolute left-0 right-0 hidden overflow-hidden border rounded-b bg-gray-50"></ul>
            </div>

            <!-- Cart Button -->
            <div class="absolute right-0 p-2 space-x-2 lg:relative lg:block">
                @auth
                    <button @click="cartOpen = !cartOpen" class="inline-flex items-center focus:outline-none">
                        <i class='bx bx-cart' style="font-size: 1.2rem;"></i>
                        @if (!empty($mycart->cartItems))
                            @if ($mycart->cartItems->isNotEmpty())
                                <div
                                    class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-[10px] font-medium text-white bg-red-600 rounded-full">
                                    {{ count($mycart->cartItems) }}
                                </div>
                            @endif
                        @endif

                    </button>
                    <button @click="userDropdown = !userDropdown" class="inline-flex items-center gap-2 p-2 lg:hidden"
                        type="button">
                        <i class="bx bx-user"></i>
                    </button>
                    <ul x-show="userDropdown" x-on:click.away="userDropdown = false"
                        :class="userDropdown ? 'opacity-100' : ''"
                        class="absolute right-0 z-10 py-2 mt-1 space-y-2 text-sm text-black bg-white border rounded opacity-0 lg:hidden w-36">
                        @if (\Auth::user()->usertype === 'admin' || \Auth::user()->usertype === 'vendor')
                            @php
                                $usertype = \Auth::user()->usertype;
                            @endphp
                            <li>
                                <a href="{{ route("$usertype.dashboard") }}"
                                    class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                    Dashboard
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('profile.info') }}"
                                class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('order.index') }}"
                                class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                Orders
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.edit') }}"
                                class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                Settings
                            </a>
                        </li>
                        <hr>
                        <li>
                            <form action="{{ route('logout') }}" method="post"
                                class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                @csrf
                                <button type="submit" class="inline-flex items-center gap-1">
                                    <i class="bx bx-log-out"></i>
                                    <span>LogOut</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>

            <!-- User Account -->
            <div class="items-center hidden gap-2 text-xl lg:flex">
                <!-- User Account Dropdown -->
                <div class="relative p-2">
                    @auth
                        <button @click="userDropdown = !userDropdown" class="flex items-center gap-2 p-2" type="button">
                            <i class="bx bx-user"></i>
                        </button>
                        <ul x-show="userDropdown" x-on:click.away="userDropdown = false"
                            :class="userDropdown ? 'opacity-100' : ''"
                            class="absolute right-0 z-10 py-2 mt-1 space-y-2 text-sm text-black bg-white border rounded opacity-0 w-36">
                            @if (\Auth::user()->usertype === 'admin' || \Auth::user()->usertype === 'vendor')
                                @php
                                    $usertype = \Auth::user()->usertype;
                                @endphp
                                <li>
                                    <a href="{{ route("$usertype.dashboard") }}"
                                        class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                        Dashboard
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('profile.info') }}"
                                    class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('order.index') }}"
                                    class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                    Orders
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                    Settings
                                </a>
                            </li>
                            <hr>
                            <li>
                                <form action="{{ route('logout') }}" method="post"
                                    class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center gap-1">
                                        <i class="bx bx-log-out"></i>
                                        <span>LogOut</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    @else
                        <ul class="flex items-center gap-4 text-sm">
                            <li>
                                <a href="{{ route('vendor.auth.register') }}"
                                    class="block px-3 py-2 whitespace-no-wrap border rounded hover:bg-gray-200">
                                    Become a Seller
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}"
                                    class="block px-3 py-2 text-white whitespace-no-wrap bg-green-400 rounded hover:bg-gray-200">
                                    LogIn / Register
                                </a>
                            </li>
                        </ul>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="isOpen" @click.away="isOpen = false" class="fixed inset-0 z-10 bg-white shadow-lg sm:hidden">
            <div class="flex flex-col p-6">
                <button @click="isOpen = false" class="self-end">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path fill-rule="evenodd" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <nav class="flex flex-col mt-4 space-y-4">
                    <!-- Mobile Navigation Links -->
                    <a href="{{ route('homepage') }}" class="text-lg">Home</a>
                    <a href="{{ route('products.index') }}" class="text-lg">Shop</a>
                    <a href="{{ route('products.index') }}" class="text-lg">Product</a>
                    <a href="{{ route('products.index') }}" class="text-lg">Blog</a>
                    <a href="{{ route('products.index') }}" class="text-lg">Pages</a>

                    <!-- Search Bar  -->
                    <div class="relative mt-4 text-stone-600">
                        <span class="absolute inset-y-0 right-0 flex items-center px-3 rounded-r">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <input type="text" class="w-full pl-4 pr-16 border border-gray-200 rounded focus:ring-0"
                            placeholder="Search">
                    </div>



                    <!-- User Account Dropdown  -->
                    <div class="relative mt-4">
                        @guest
                            <ul class="flex flex-col space-y-2 text-sm">
                                <li>
                                    <a href="{{ route('vendor.auth.register') }}"
                                        class="block px-3 py-2 whitespace-no-wrap border rounded hover:bg-gray-200">
                                        Become a Seller
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('login') }}"
                                        class="block px-3 py-2 text-white whitespace-no-wrap bg-green-400 rounded hover:bg-gray-200">
                                        LogIn / Register
                                    </a>
                                </li>
                            </ul>
                        @endauth
                    </div>
                </nav>
            </div>
        </div>

        <!-- Navigation Bar -->
        <nav class="items-center justify-between hidden px-6 bg-white lg:py-2 lg:flex border-y">
            <div class="flex gap-8 space-x-4 text-sm tracking-wide">
                <!-- Categories Dropdown -->
                <div class="relative hidden lg:block">
                    <button @click="categoryMenuDropdown = !categoryMenuDropdown" type="button"
                        class="inline-flex items-center gap-2 px-6 py-2 text-white bg-green-500 border rounded-md hover:text-blue-500">
                        <i class="bx bx-category"></i>
                        <span>Browse All Categories</span>
                        <i class='bx bx-chevron-down'></i>
                    </button>
                    <ul x-show="categoryMenuDropdown" @click.away="categoryMenuDropdown = false"
                        :class="categoryMenuDropdown ? 'opacity-100' : ''"
                        class="absolute right-0 z-10 w-full py-2 mt-1 space-y-2 text-sm text-black bg-white border rounded opacity-0">
                        @foreach (App\Models\Category::all() as $category)
                            <li>
                                <a href="{{ route('product.category-filter', $category->slug) }}"
                                    class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                    {{ $category->category_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Other Links -->
                <div class="hidden space-x-4 text-sm lg:flex">
                    <a class="py-2 hover:text-blue-500" href="{{ route('homepage') }}">Home</a>
                    <a class="py-2 hover:text-blue-500" href="{{ route('products.index') }}">Shop</a>
                    {{-- <a class="py-2 hover:text-blue-500" href="{{ route('products.index') }}">Product</a> --}}
                    {{-- <a class="py-2 hover:text-blue-500" href="{{ route('products.index') }}">Blog</a>
                    <a class="py-2 hover:text-blue-500" href="{{ route('products.index') }}">Pages</a> --}}
                </div>
            </div>


        </nav>
    </header>

    <!-- Include cart slide -->
    @include('frontend.includes.cart-slide')
</div>
