<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">
        <style type="text/css">
            body {
                padding-top: 56px;
            }
        </style>

    </head>
    <body>
        @include('common.header')
        @yield('content')
        @include('common.footer')
        <script src="/js/app.js" charset="utf-8"></script>
    </body>
</html>
