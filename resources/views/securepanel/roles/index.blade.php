@inject('request', 'Illuminate\Http\Request')

@extends('layouts.backend.app')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <!-- begin::Quick Sidebar -->
    @include('partials.backend.sidebar')
    <!-- end::Quick Sidebar -->

        <!-- END: Left Aside -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">
                            {{trans('label.roles_title')}}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    <script src="{{ url('laraking/backend/js/pages/roles.js') }}" type="text/javascript"></script>
@stop
