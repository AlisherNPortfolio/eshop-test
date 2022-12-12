<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ Vite::asset('resources/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ Vite::asset('resources/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ Vite::asset('resources/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ Vite::asset('resources/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ Vite::asset('resources/css/animate.css') }}" rel="stylesheet">
	<link href="{{ Vite::asset('resources/css/main.css') }}" rel="stylesheet">
	<link href="{{ Vite::asset('resources/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ Vite::asset('resources/js/html5shiv.js') }}"></script>
    {{-- <script src="{{ Vite::asset('resources/js/respond.min.js') }}"></script> --}}
    <![endif]-->
    {{-- <link rel="shortcut icon" href="{{ Vite::asset('resources/images/ico/favicon.ico') }}"> --}}
    {{-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ Vite::asset('resources/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ Vite::asset('resources/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ Vite::asset('resources/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ Vite::asset('resources/images/ico/apple-touch-icon-57-precomposed.png') }}"> --}}
</head><!--/head-->

<body>
	{{-- header --}}
    @include('layout-components.header')

	@yield('content')

	{{-- footer --}}
    @include('layout-components.footer')


    <script type="module" src="{{ Vite::asset('resources/js/jquery.js') }}"></script>
	<script type="module" src="{{ Vite::asset('resources/js/bootstrap.min.js') }}"></script>
	<script type="module" src="{{ Vite::asset('resources/js/jquery.scrollUp.min.js') }}"></script>
	<script type="module" src="{{ Vite::asset('resources/js/price-range.js') }}"></script>
    <script type="module" src="{{ Vite::asset('resources/js/jquery.prettyPhoto.js') }}"></script>
    <script type="module" src="{{ Vite::asset('resources/js/main.js') }}"></script>
</body>
</html>
