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
                <input type="text" class="w-full pl-4 pr-16 border rounded border-slate-800 focus:ring-0"
                    type="text" placeholder="Search">
            </div>
            <div class="items-center justify-end hidden gap-2 text-xl lg:flex">
                <div x-data="{ userDropdown: false }" class="relative p-2">
                    <button x-on:click="userDropdown = true" class="flex items-center gap-2" type="button">
                        <i class='bx bx-bell'></i>
                    </button>
                    <ul x-show="userDropdown" x-on:click.away="userDropdown = false"
                        :class="userDropdown ? 'opacity-100' : ''"
                        class="absolute right-0 z-10 w-64 mt-2 overflow-hidden text-xs text-justify bg-white border rounded opacity-0 text-slate-600 ">
                        <li class="inline-flex items-center gap-3 p-3 border-b">
                            <i class='bx bx-envelope'></i>
                            <span>
                                Lorem, ipsum dolo a tempore ab officia labore expedita eligendi.
                            </span>
                        </li>
                        <li class="inline-flex items-center gap-3 p-3 border-b">
                            <i class='bx bx-envelope'></i>
                            <span>
                                Lorem, ipsum dolo a tempore ab officia labore expedita eligendi.
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="p-2">
                    <button @click="cartOpen = !cartOpen" class="inline-flex items-center focus:outline-none">
                        <i class="bx bx-heart"></i>
                    </button>
                </div>
                <div class="relative p-2">
                    <button @click="cartOpen = !cartOpen" class="inline-flex items-center focus:outline-none">
                        <i class='bx bx-cart'></i>
                    </button>
                    @auth
                        @if (!empty($mycart->cartItems))
                            <div
                                class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-[10px] font-medium text-white bg-red-600 rounded-full">
                                {{ count($mycart->cartItems) }}</div>
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
                            <li>
                                <a href="{{ route('admin.dashboard') }}"
                                    class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                    Orders
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                    My Account
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
                                <a href="{{ route('customer.login') }}"
                                    class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                                    Log In
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('customer.register') }}"
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
                <a class="py-2 hover:text-blue-500" href="{{ route('products.index') }}">Shop</a>
                <a class="py-2 hover:text-blue-500 " href="#">Pages</a>
                <a class="py-2 hover:text-blue-500 " href="#">Blogs</a>
            </div>
        </nav>

    </header>

    <div @click.outside="cartOpen = false" x-show="cartOpen" x-cloak
        x-transition:enter="transition ease-out duration-300 translate-x-full" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300 translate-x-full"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed top-0 right-0 z-10 w-full h-full max-w-sm py-4 space-y-8 overflow-y-auto text-gray-700 transition duration-300 transform bg-white border-l border-gray-300">
        <div class="flex items-center justify-between px-6 pb-4 border-b">
            <h3 class="text-xl font-medium ">My cart</h3>
            <button @click="cartOpen = !cartOpen" class=" focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        @auth
            <div class="space-y-6">
                @if ($mycart->cartItems->isNotEmpty())
                    @foreach ($mycart->cartItems as $item)
                        <div class="flex justify-between px-6 ">
                            <div class="flex">
                                <img class="object-cover w-20 h-20 p-3 border rounded"
                                    src="{{ asset('admin/images/product/' . $item->product->mainImage->image) }}"
                                    alt="">
                                <div class="mx-3">
                                    <h3 class="text-sm ">{{ $item->product->name }}</h3>
                                    <div class="flex items-center mt-2">
                                        <button class="text-gray-500 focus:outline-none focus:">
                                            <svg class="w-5 h-5" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                        </button>
                                        <span class="mx-2 ">1</span>
                                        <button class="text-gray-500 focus:outline-none focus:">
                                            <svg class="w-5 h-5" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <span class="">NPR {{ $item->product->price }}</span>
                        </div>
                    @endforeach
                    <div class="px-6 border-y">
                        <ul class="py-4 space-y-4 font-medium text-gray-500">
                            <li class="inline-flex justify-between w-full">
                                <span>Subtotal:</span>
                                <span>NPR {{ $mycart->subtotal }}</span>
                            </li>
                            <li class="inline-flex justify-between w-full">
                                <span>Shipping Charge:</span>
                                <span>NPR 50</span>
                            </li>
                        </ul>
                    </div>
                @else
                    <p class="px-6">No any products in cart</p>
                @endif

                <div class="absolute bottom-0 left-0 right-0 py-4 space-y-4">
                    <div class="inline-flex justify-between w-full px-6 font-medium">
                        <span>Total: </span>
                        <span>NPR {{ $mycart->subtotal??0 }}</span>
                    </div>
                    <div class="flex justify-between gap-4 px-6">
                        <a href="{{ route('cart.index') }}"
                            class="flex items-center justify-center w-full gap-2 py-2 text-sm capitalize bg-gray-100 rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <span>View Cart</span>
                        </a>
                        <a href="{{ route('checkout.billing') }}"
                            class="flex items-center justify-center w-full gap-2 py-2 text-sm text-white capitalize bg-blue-600 rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <span>Checkout</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="px-6 ">
                <div class="flex mb-3">
                    <h2>Please Login to view cart</h2>
                </div>
                <div>
                    <a href="{{ route('customer.login') }}"
                        class="flex items-center justify-center px-3 py-2 my-2 text-sm font-medium text-white uppercase bg-blue-600 rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                        <span>Login</span>
                        <svg class="w-5 h-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @endauth
    </div>
</div>
