<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>
    @yield("title")
</title>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="{{asset('asset/js/init-alpine.js')}}"></script>

<style>
    [x-cloak] { 
        display: none !important;
     }
  </style>