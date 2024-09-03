<!DOCTYPE html>
<html lang="en" x-data="data()">
<head>
    @include("frontend.includes.top")
</head>
<body>
    <header class="fixed top-0 left-0 right-0 z-50 bg-gray-50">
        @include("frontend.includes.top-header")
        @include("frontend.includes.header")
        {{-- @include('frontend.includes.menubar') --}}
    </header>
    <main class="mt-10 lg:mt-44">
        @yield("content")
    </main>
    @include('frontend.includes.footer')
    @include('frontend.includes.bottom')
    @stack('scripts')
</body>
</html>