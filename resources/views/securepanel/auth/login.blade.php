@extends('layouts.backend.auth')

@section('page_level_css')
    <!--begin::Page Resources -->
    <!--end::Page Resources -->
@stop

@section('content')
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url({{url('laraking/backend/img/bg-3.jpg')}});">
            <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
                <div class="m-login__container">
                    <div class="m-login__logo">
                        <a href="#">
                            <img src="{{url('laraking/img/logo.png')}}" width="100px" height="100px">
                        </a>
                    </div>
                    <div class="m-login__signin">
                        @if (count($errors) > 0)
                            <br>
                            <div class="alert alert-danger">
                                <strong>{{ trans('label.secure_panel_login_error_message_one') }}</strong> {{ trans('label.secure_panel_login_error_message_two') }}
                                <br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('status'))
                            <br><br>
                            <div class="alert alert-success">
                                <ul>
                                    <li><?php echo e(session('status')); ?></li>
                                </ul>
                            </div>
                        @endif
                        @if (session('status_error'))
                            <br><br>
                            <div class="alert alert-danger">
                                <ul>
                                    <li><?php echo e(session('status_error')); ?></li>
                                </ul>
                            </div>
                        @endif
                        <form class="m-login__form m-form" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="email" placeholder="Email" name="email" autocomplete="off">
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input m-login__form-input--last" minlength="6" maxlength="15" type="password" placeholder="Password" name="password">
                            </div>
                            <div class="row m-login__form-sub">
                                <div class="col m--align-right m-login__form-right">
                                    <a href="{{ url('securepanel/password/reset')}}" id="m_login_forget_password" class="m-link">
                                        {{ trans('label.secure_panel_forgot_password_title') }}
                                    </a>
                                </div>
                            </div>
                            <div class="m-login__form-action">
                                <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                                    {{ trans('label.secure_panel_login_button_title') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Page -->
@endsection

@section('page_level_script')
    <!--begin::Page Resources -->
    <script src="{{ url('laraking/backend/js/pages/login.js') }}" type="text/javascript"></script>
    <!--end::Page Resources -->
@stop
