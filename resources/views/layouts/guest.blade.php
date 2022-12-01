<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon"
          href="{{asset('assets/images/kodestudio-logo.svg')}}">
    <title>{{ config('app.name', 'Laravel9') }}</title>
{{--    <link rel="stylesheet"--}}
{{--          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body>
<x-ui.loader/>
<div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
</div>
</body>
</html>
