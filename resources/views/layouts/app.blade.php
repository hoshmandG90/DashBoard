<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{asset('assets/css/tailwind.min.css')}}" rel="stylesheet">

    <link rel="icon" href="{{asset('assets/img/login.svg')}}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

    @livewireStyles
</head>

<body>

    @yield('content')


    @livewireScripts
    <script src="{{asset('assets/js/turbolinks.js')}}" defer></script>
    <script src="{{asset('assets/js/turbolinks.min.js')}}" defer></script>
    
</body>

</html>
