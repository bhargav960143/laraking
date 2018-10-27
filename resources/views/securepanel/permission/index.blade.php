@inject('request', 'Illuminate\Http\Request')

@php
    $user_info = session('user_info');
@endphp

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
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            {{trans('label.permission_title')}}
                        </h3>
                        <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                            <li class="m-nav__item m-nav__item--home">
                                <a href="{{ url('securepanel/dashboard') }}" title="{{trans('label.dashboard_title')}}"
                                   class="m-nav__link m-nav__link--icon">
                                    <i class="m-nav__link-icon la la-home"></i>
                                </a>
                            </li>
                            <li class="m-nav__separator">
                                -
                            </li>
                            <li class="m-nav__item">
                                <a href="{{ url('securepanel/roles') }}" title="{{trans('label.roles_title')}}"
                                   class="m-nav__link">
                                    <span class="m-nav__link-text">
                                        {{trans('label.roles_title')}}
                                    </span>
                                </a>
                            </li>
                            <li class="m-nav__separator">
                                -
                            </li>
                            <li class="m-nav__item">
                                <a href="{{ url('securepanel/roles/permission/' . $role->id) }}"
                                   title="{{trans('label.permission_title')}}" class="m-nav__link">
                                    <span class="m-nav__link-text">
                                        {{trans('label.permission_title')}}
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
                                    {{ucfirst($role->name)}} {{trans('label.permission_title_listing')}}
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a href="{{ url('securepanel/roles') }}"
                                       class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                                        <span>
                                            <i class="la la-minus-circle"></i>
                                            <span>
                                                {{trans('label.back_label')}}
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
                                    <li>{{ session('permission_success_msg') }}</li>
                                </ul>
                            </div>
                        @endif
                        @if (session('role_error_msg'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{ session('permission_error_msg') }}</li>
                                </ul>
                            </div>
                        @endif
                        <div id="ajax_success_msg" style="display: none;">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                <strong>
                                    Well done!
                                </strong>
                                <span id="success_msg_ajax">You successfully read this important alert message.</span>
                            </div>
                        </div>
                        <div id="ajax_failed_msg" style="display: none;">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                <strong>
                                    Oh snap!
                                </strong>
                                <span id="failed_msg_ajax">Change a few things up and try submitting again.</span>
                            </div>
                        </div>
                        <!--BEGIN: Table -->
                        <div class="m-widget11">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table">
                                    <!--begin::Thead-->
                                    <thead>
                                    <tr>
                                        <td class="m-widget11__label">
                                            Assign/Unassign
                                        </td>
                                        <td class="m-widget11__app">
                                            Controller Name
                                        </td>
                                        <td class="m-widget11__sales">
                                            Method Name
                                        </td>
                                    </tr>
                                    </thead>
                                    <!--end::Thead-->
                                    <!--begin::Tbody-->
                                    <tbody>
                                    @if(count($controller_method_list) > 0)
                                        @foreach($controller_method_list as $keyPermission => $valuePermission)
                                        <tr>
                                            <td>
                                                <div class="m-checkbox-list">
                                                    <label class="m-checkbox m-checkbox--solid m-checkbox--state-brand">
                                                        <input type="checkbox" onclick="permission_call_back(this)" data-perMethod="{{$valuePermission['method_name']}}" data-perController="{{$valuePermission['controller_name']}}" name="permission_name" @if($valuePermission['is_assign']) {{'checked'}} @endif>
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                {{$valuePermission['controller_name']}}
                                            </td>
                                            <td>
                                                {{$valuePermission['method_name']}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">
                                                {{trans('label.permission_not_found_title')}}
                                            </td>
                                        </tr>
                                    @endif

                                    </tbody>
                                    <!--end::Tbody-->
                                </table>
                                <!--end::Table-->
                                <input type="hidden" name="role_id" id="role_id" value="{{$role->id}}">
                            </div>
                        </div>
                        <!--END: Table -->
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            <!-- END: Content -->
        </div>
    </div>
@endsection

@section('pagescript')
    <script src="{{ url('laraking/backend/js/pages/permission_custom.js') }}" type="text/javascript"></script>
@stop
