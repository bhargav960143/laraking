@php
    $data = session('user_info');
@endphp
<meta charset="utf-8" />
{{--<title>
    {{$meta_title}}
</title>
<meta name="description" content="{{$meta_description}}">
<meta name="keywords" content="{{$meta_keyboard}}">--}}
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--begin::Web font -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
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
<link href="{{ url('laraking/backend/css/admin_vendor.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('laraking/backend/css/admin_style.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Base Styles -->
<link rel="shortcut icon" href="{{ url('laraking/img/favicon.ico') }}" />

<script>
    var BASE_URL = '@php echo URL::to('/securepanel'); @endphp';
    var SITE_URL = '@php echo URL::to('/'); @endphp';
    var USER_ROLE = '@php echo $data['logged_in_role']; @endphp';
</script>
