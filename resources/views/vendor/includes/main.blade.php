<!DOCTYPE html>

<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    @include('backend.includes.top')
    @yield('styles')
</head>

<body >
    <div class="flex h-screen dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('vendor.includes.menubar')
        <div class="z-10 flex flex-col flex-1 w-full bg-white ">
            @include('backend.includes.header')
            @include('backend.includes.loading')
            <main class="hidden h-full overflow-y-auto lg:px-3" id="content">
                @yield('content')
            </main>
        </div>
    </div>
    @include('backend.includes.bottom')
    @yield('scripts')
    @stack('script')
</body>

</html>
