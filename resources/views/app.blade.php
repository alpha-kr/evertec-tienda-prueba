<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="icon" href="assets/images/items/1.jpg" type="image/x-icon" />
        <link href="/assets/css/bootstrap.css" rel="stylesheet">
        <link href="/assets/css/ui.css" rel="stylesheet">
        <link href="/assets/css/responsive.css" rel="stylesheet">
       

        <link href="/assets/css/all.min.css" rel="stylesheet">
        <script src="/assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <style>
            .no-border {
                border: 0 !important;
            }
        </style>
        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
    </body>
</html>
