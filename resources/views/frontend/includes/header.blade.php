<div x-data="{ cartOpen: false, isOpen: false }">
    <header>
        <div class="flex items-center justify-between gap-4 px-6 py-3">
            <a href="{{ route('homepage') }}" class="font-bold lg:text-3xl text-slate-800 ">
                Khelretail
            </a>
            <div class="flex sm:hidden">
                <button @click="isOpen = !isOpen" type="button"
                    class=" hover:text-gray-500 focus:outline-none focus:text-gray-500" aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path fill-rule="evenodd"
                            d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="relative hidden w-1/2 mx-auto lg:block text-stone-600">
                <span class="absolute inset-y-0 right-0 flex items-center px-3 rounded-r ">
                    <svg class="w-5 h-5 " viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <input type="text" class="w-full pl-4 pr-16 border border-gray-200 rounded focus:ring-0"
                    type="text" placeholder="Search">
            </div>
            <div class="items-center justify-end hidden gap-2 text-xl lg:flex">

                <div class="relative p-2">
                    <button @click="cartOpen = !cartOpen" class="inline-flex items-center focus:outline-none">
                        <i class='bx bx-cart'></i>
                    </button>
                    @auth
                        @if (!empty($mycart->cartItems))
                            @if ($mycart->cartItems->isNotEmpty())
                                <div
                                    class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-[10px] font-medium text-white bg-red-600 rounded-full">
                                    {{ count($mycart->cartItems) }}</div>
                            @endif
                        @endif
                    @endauth
                </div>

                <div x-data="{ userDropdown: false }" class="relative p-2">
                    <button x-on:click="userDropdown = true" class="flex items-center gap-2 p-2 " type="button">
                        <i class="bx bx-user"></i>
                    </button>
                    <ul x-show="userDropdown" x-on:click.away="userDropdown = false"
                        :class="userDropdown ? 'opacity-100' : ''"
                        class="absolute right-0 z-10 py-2 mt-1 space-y-2 text-sm text-black bg-white border rounded opacity-0 w-36">
                        @auth
                            @if (\Auth::user()->usertype === 'admin' || \Auth::user()->usertype === 'vendor')
                                @php
                                   $usertype= \Auth::user()->usertype;
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
                                    <button type="submit" class="inline-flex items-center gap-1"><i
                                            class="bx bx-log-out"></i><span>LogOut</span></button>
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                    Log In
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}"
                                    class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                    Register
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>


            </div>
        </div>
        <nav :class="isOpen ? '' : 'hidden'" class="px-6 py-2 border-y bg-gray-50 sm:flex sm:items-center ">
            <div class="flex flex-col gap-12 space-x-4 text-sm tracking-wide sm:flex-row">
                <div x-data="{ categoryMenuDropdown: false }" class="relative">
                    <button x-on:click="categoryMenuDropdown = true" type="button"
                        class="inline-flex items-center gap-2 px-6 py-2 text-white bg-green-500 border rounded-md hover:text-blue-500">
                        <i class="bx bx-category"></i>
                        <span>Browse All Categories</span>
                        <i class='bx bx-chevron-down'></i>
                    </button>

                    <ul x-show="categoryMenuDropdown" x-on:click.away="categoryMenuDropdown = false"
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
                <a class="py-2 hover:text-blue-500 " href="{{ route('homepage') }}">Home</a>
                <a class="py-2 hover:text-blue-500" href="{{ route('products.index') }}">Shops</a>
                <a class="py-2 hover:text-blue-500" href="{{ route('products.index') }}">Products</a>
            </div>
        </nav>

    </header>

    @include('frontend.includes.cart-slide')
</div>
