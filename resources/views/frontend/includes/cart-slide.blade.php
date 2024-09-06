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
                @if (!empty($mycart->cartItems))
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
                                        <span class="mx-2 ">{{$item->quantity}}</span>
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
                            <div class="flex flex-col justify-between space-y-2 ">
                                <form action="{{route('cart.remove',$item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center p-1 ml-auto text-white bg-red-600 rounded">
                                        <i class="bx bx-x"></i>
                                    </button>
                                </form>
                                <span class="">NPR {{ $item->product->discount_price() }}</span>
                            </div>
                        </div>
                    @endforeach
                    @if($mycart->cartItems->isNotEmpty())
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
                    @endif
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
                    <a href="{{ route('login') }}"
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