<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <script type="text/javascript" rel="script" src="{{asset('js/app.js')}}"></script>
         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>    
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>

<body>
    @include('inc.adminNavbar')
    @include('inc.messages')
        @yield('content')
        @yield('scripts')
</body>
<footer>
    @yield('footer')
</footer>
</html>
