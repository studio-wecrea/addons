<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ url('/resources/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <!-- <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script> -->
    @vite(['resources/css/app.css', 'resources/css/custom.css','resources/js/app.js'])
</head>

    <body id="app">
        @include('layouts.header')
        @include('layouts.navbar')
        @yield('content')
        @include('layouts.footer')
    </body>
</html>
