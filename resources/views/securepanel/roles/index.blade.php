@inject('request', 'Illuminate\Http\Request')

@php
    $user_info = session('user_info');
@endphp

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
                            {{trans('label.roles_title')}}
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
                                <a href="{{ url('securepanel/roles') }}" title="{{trans('label.roles_title')}}" class="m-nav__link">
                                    <span class="m-nav__link-text">
                                        {{trans('label.roles_title')}}
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
                                    {{trans('label.roles_title_listing')}}
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a href="{{ url('securepanel/roles/create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>
                                                {{trans('label.roles_add_title')}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        @if (session('role_success_msg'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ session('role_success_msg') }}</li>
                                </ul>
                            </div>
                        @endif
                        @if (session('role_error_msg'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{ session('role_error_msg') }}</li>
                                </ul>
                            </div>
                        @endif
                        <!--BEGIN: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="table_roles_list">
                            <thead>
                            <tr>
                                <th>
                                    {{trans('label.no_title')}}
                                </th>
                                <th>
                                    {{trans('label.role_name_field_title')}}
                                </th>
                                <th>
                                    {{trans('label.created_date_field_title')}}
                                </th>
                                <th>
                                    {{trans('label.action_field_title')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th id="role_no"></th>
                                <th id="role_name"></th>
                                <th id="created_date"></th>
                                <th id="action"></th>
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
    <script src="{{ url('laraking/backend/js/pages/datatable/roles_data_table.js') }}" type="text/javascript"></script>
@stop
