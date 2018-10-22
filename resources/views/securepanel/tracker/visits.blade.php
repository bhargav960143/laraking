@inject('request', 'Illuminate\Http\Request')

@extends('layouts.backend.app')

@section('pagecss')
    <link href="{{ url('laraking/backend/css/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@stop

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
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            {{trans('label.visits_label')}}
                        </h3>
                        <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                            <li class="m-nav__item m-nav__item--home">
                                <a href="{{ url('securepanel/dashboard') }}" title="{{trans('label.dashboard_title')}}" class="m-nav__link m-nav__link--icon">
                                    <i class="m-nav__link-icon la la-home"></i>
                                </a>
                            </li>
                            <li class="m-nav__separator">
                                -
                            </li>
                            <li class="m-nav__item">
                                <a href="{{ url('securepanel/tracker/visits') }}" title="{{trans('label.visits_label')}}" class="m-nav__link">
                                    <span class="m-nav__link-text">
                                        {{trans('label.visits_label')}}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END: Subheader -->
            <!-- BEGIN: Content -->
            <div class="m-content">
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    {{trans('label.visits_title_listing')}}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        @if (session('role_success_msg'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ session('visits_success_msg') }}</li>
                                </ul>
                            </div>
                        @endif
                        @if (session('role_error_msg'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{ session('visits_error_msg') }}</li>
                                </ul>
                            </div>
                    @endif
                    <!--BEGIN: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="table_visits_list">
                            <thead>
                            <tr>
                                <th>
                                    {{trans('label.no_title')}}
                                </th>
                                <th>
                                    {{trans('label.visits_ip_field_title')}}
                                </th>
                                <th>
                                    {{trans('label.visits_country_field_title')}}
                                </th>
                                <th>
                                    {{trans('label.visits_user_field_title')}}
                                </th>
                                <th>
                                    {{trans('label.visits_device_field_title')}}
                                </th>
                                <th>
                                    {{trans('label.visits_browser_field_title')}}
                                </th>
                                <th>
                                    {{trans('label.visits_url_field_title')}}
                                </th>
                                <th>
                                    {{trans('label.visits_page_views_field_title')}}
                                </th>
                                <th>
                                    {{trans('label.visits_created_date_field_title')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th id="visit_no"></th>
                                <th id="client_ip"></th>
                                <th id="country_city"></th>
                                <th id="user_info"></th>
                                <th id="device"></th>
                                <th id="browser"></th>
                                <th id="url"></th>
                                <th id="page_views"></th>
                                <th id="created_date"></th>
                            </tr>
                            </tbody>
                        </table>
                        <!--END: Datatable -->
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            <!-- END: Content -->
        </div>
    </div>
@endsection

@section('pagescript')
    <script src="{{ url('laraking/backend/js/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ url('laraking/backend/js/pages/datatable/track_visits_data_table.js') }}" type="text/javascript"></script>
@stop
