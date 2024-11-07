<div class="items-center justify-between hidden px-6 py-2 text-xs border-b lg:flex">

    <!-- End topBar-left -->

    <div class="flex items-center gap-4 ">
        <a class="nav-link" href="#">FAQ</a>
        <a class="nav-link" href="{{ route('contact-us') }}">Contact us</a>
        <a class="nav-link" href="{{ route('about') }}">About us</a>
    </div>


    <p>Best discounts 
        {{-- <span>and voucher codes</span>  --}}
        for online stores</p>

    <div class="flex items-center gap-3">
        <div x-data="{ userDropdown: false }" class="relative">
            <a href="{{ route('vendor.register') }}" class="flex items-center gap-2" type="button">
                Become a Seller
            </a>
        </div>
        <div x-data="{ userDropdown: false }" class="relative">
            <button x-on:click="userDropdown = true" class="flex items-center gap-2" type="button">
                <span>NRS</span>
                <i class='bx bx-chevron-down'></i>
            </button>
            <ul x-show="userDropdown" x-on:click.away="userDropdown = false" :class="userDropdown ? 'opacity-100' : ''"
                class="absolute right-0 z-10 py-2 mt-1 space-y-2 text-sm text-black bg-white border rounded opacity-0 w-36">

                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                        NPR
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                        NRS
                    </a>
                </li> --}}

            </ul>
        </div>

        <div x-data="{ userDropdown: false }" class="relative">
            <button x-on:click="userDropdown = true" class="flex items-center gap-2" type="button">
                <span>English</span>
                <i class='bx bx-chevron-down'></i>
            </button>
            <ul x-show="userDropdown" x-on:click.away="userDropdown = false" :class="userDropdown ? 'opacity-100' : ''"
                class="absolute right-0 z-10 py-2 mt-1 space-y-2 text-sm text-black bg-white border rounded opacity-0 w-36">

                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                        English
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-1 whitespace-no-wrap hover:bg-gray-200">
                        Nepali
                    </a>
                </li> --}}

            </ul>
        </div>

    </div>

</div>
