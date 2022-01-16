<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->
    <title>@yield('title')</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    
    <script src="{{ asset('js/sweet-alert.min.js') }}"></script> 
	<link rel="stylesheet" href="{{ asset('css/sweet-alert.css') }}">
	<link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body class="full-cover-background"	style="background-image:url({{url('assets/img/FlyH.jpg')}});background-repeat: repeat-y">
    

        <main class="py-4">
            @yield('content')
        </main>
       
</body>
</html>
