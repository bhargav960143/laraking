<script src="{{ url('laraking/backend/js/admin_vendor.bundle.js') }}" type="text/javascript"></script>
<script src="{{ url('laraking/backend/js/admin_scripts.bundle.js') }}" type="text/javascript"></script>
<script>
    window._token = '{{ csrf_token() }}';
</script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('javascript')
