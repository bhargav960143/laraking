@php
    $data = session('user_info');
@endphp
    <!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.backend.head')

    @yield('pagecss')
</head>


<!-- end::Body -->
<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <!-- BEGIN: Header -->
@include('partials.backend.header')
<!-- END: Header -->
@yield('content')
<!-- begin::Footer -->
@include('partials.backend.footer')
<!-- end::Footer -->
</div>
<!-- end:: Page -->

<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->
<!--begin::Base Scripts -->
@include('partials.backend.javascripts')
<!--end::Base Scripts -->
@yield('pagescript')
</body>
</html>
