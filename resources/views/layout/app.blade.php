<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Responsive -->
        <link href="/css/responsive/responsive.css" rel="stylesheet">
        <!-- Favicon -->
        <link rel="icon" href="/core-img/favicon.ico">

        <!-- Core Stylesheet -->
        <link href="/style.css" rel="stylesheet">

        <style>@yield('style')</style>
        
    <title>{{ config('app.name') }} - @yield('title')</title>
    </head>
    <body>
        {{--@include('navbar')--}}
       
        @yield('content')
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>@yield('script')</script>
    </body>

    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
    
</html>