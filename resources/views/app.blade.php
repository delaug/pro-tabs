<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- UIkit CSS -->
    <link href="{{ asset('css/uikit.min.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root"></div>

    <!-- UIkit JS -->
    <script src="{{ asset('js/uikit.min.js') }}" defer></script>
    <script src="{{ asset('js/uikit-icons.min.js') }}" defer></script>
    <!-- React JS -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
