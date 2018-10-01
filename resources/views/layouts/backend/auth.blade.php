<!DOCTYPE html>
<html lang="en">
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            {{ config('label.backend_login_title') }}
        </title>
        <meta name="description" content="{{ config('label.backend_login_title') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!--end::Web font -->

        <!--begin::Base Styles -->
        <link href="{{ url('laraking/backend/css/auth_vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('laraking/backend/css/auth_style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Base Styles -->

        <!--begin::Page Snippets -->
        @yield('page_level_css')
        <!--end::Page Snippets -->

        <link rel="shortcut icon" href="{{ url('laraking/img/favicon.ico') }}" />
    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <!-- begin:: Page -->
    @yield('content')
    <!-- end:: Page -->
    <!--begin::Base Scripts -->
    <script src="{{ url('laraking/backend/js/auth_vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ url('laraking/backend/js/auth_scripts.bundle.js') }}" type="text/javascript"></script>
    <!--end::Base Scripts -->
    <!--begin::Page Snippets -->
    @yield('page_level_script')
    <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
