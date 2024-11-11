<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>
    Khelretail
    @yield('title')
</title>
<link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="{{ asset('asset/js/init-alpine.js') }}"></script>
@vite(['resources/css/app.css'])

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
