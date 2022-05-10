<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ page_direction() }}">
<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="title" content="Welcome to LibreHealth EHR">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title') | {{ config('app.name', 'LibreHealth EHR') }}</title>

    <link rel="shortcut icon" type="image/x-icon"
          href="{{ config('app.shortcut_icon') ?: asset('images/favicon.ico') }}">
    <meta name="description" content="{{ config('app.description') }}">
    <meta name="keywords" content="{{ config('app.keywords') }}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @routes
</head>
<body class="bg-gray-50 h-screen antialiased leading-none flex flex-col overflow-scroll-container">

        @inertia

        @include('partials.footer')
        <script type="text/javascript">
            window.app_name = "{{ app_name() }}";
            window.app_version = "{{ app_version() }}";
            window.default_locale = "{{ config('app.locale') }}";
            window.fallback_locale = "{{ config('app.fallback_locale') }}";
        </script>
        <script src="{{ mix('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
        <script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
</body>
</html>
