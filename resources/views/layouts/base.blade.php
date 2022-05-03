<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('css')
    @stack('css_after')
    <script src="{{ asset('js/alpine.js') }}"></script>
</head>
<body>
@yield('body')
<script src="{{ asset('js/app.js') }}"></script>
@stack('js')
@stack('js_after')
</body>
</html>
