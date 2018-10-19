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
                            <li class="m-nav__separator">
                                -
                            </li>
                            <li class="m-nav__item">
                                <a href="{{ url('securepanel/roles/edit/'.$role->id) }}" title="{{trans('label.roles_edit_title')}}" class="m-nav__link">
                                    <span class="m-nav__link-text">
                                        {{trans('label.roles_edit_title')}}
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
                                    {{trans('label.roles_edit_title')}}
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a href="{{ url('securepanel/roles') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                                        <span>
                                            {{trans('label.back_label')}}
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--BEGIN: Form -->
                    {!! Form::open(['name' => 'form_role_edit', 'id' => 'form_role_edit', 'method' => 'PATCH', 'class' => 'm-form m-form--fit m-form--label-align-right ', 'route' => ['securepanel.roles.update', $role->id]]) !!}
                    @if (count($errors) > 0)
                        <br>
                        <div class="alert alert-danger">
                            <strong><?php echo e(trans('label.secure_panel_login_error_message_one')); ?></strong> <?php echo e(trans('label.secure_panel_login_error_message_two')); ?>
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <label for="role_name">
                                        {{trans('label.role_name_field_title')}}<span class="required-red"> * </span>
                                    </label>
                                    <input type="text" class="form-control m-input"
                                           name="role_name" id="role_name" autocomplete="off" required
                                           aria-describedby="emailHelp"
                                           value="{{$role->name}}"
                                           placeholder="{{trans('label.role_name_field_note')}}">
                                    <span class="m-form__help" style="float:right">
                                        {{trans('label.role_name_field_note')}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button id="m_role_edit_submit" class="btn btn-success">
                                        {{ trans('label.submit_label') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <!--END: Form -->
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            <!-- END: Content -->
        </div>
    </div>
@endsection

@section('pagescript')
    <script src="{{ url('laraking/backend/js/pages/role_edit.js') }}" type="text/javascript"></script>
@stop
