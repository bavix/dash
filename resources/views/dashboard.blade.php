<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>MediaServer - Dashboard</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
        <link rel="apple-touch-icon" sizes="57x57" href="/icons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/icons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/icons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/icons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/icons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/icons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/icons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/icons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/icons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/icons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
        <meta name="msapplication-TileImage" content="/icons/ms-icon-144x144.png">
        <link rel="manifest" href="/icons/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta charset="utf-8" />
    </head>
    <body class="has-background-light">
        <div id="app">
            <hero></hero>
            <services></services>
        </div>
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
