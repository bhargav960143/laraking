<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('partials.frontend.head')
    </head>
    <body>
        @yield('content')
    </body>
</html>
