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
                            Dashboard
                        </h3>
                    </div>
                </div>
            </div>
            <!-- END: Subheader -->
            <div class="m-content">
                <div class="m-portlet">
                    <div class="m-portlet__body  m-portlet__body--no-padding">
                        <div class="row m-row--no-padding m-row--col-separator-xl">
                            <div class="col-xl-6">
                                <!--begin:: Widgets/Daily Sales-->
                                <div class="m-widget14">
                                    <div class="m-widget14__header m--margin-bottom-30">
                                        <h3 class="m-widget14__title">
                                            {{trans('label.dashboard_user_views_title')}}
                                        </h3>
                                        <span class="m-widget14__desc">
                                            {{trans('label.dashboard_user_views_description')}}
                                        </span>
                                    </div>
                                    <div class="m-widget14__chart">
                                        <canvas id="user_views_container"></canvas>
                                    </div>
                                </div>
                                <!--end:: Widgets/Daily Sales-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin:: Widgets/Daily Sales-->
                                <div class="m-widget14">
                                    <div class="m-widget14__header m--margin-bottom-30">
                                        <h3 class="m-widget14__title">
                                            {{trans('label.dashboard_user_registered_views_title')}}
                                        </h3>
                                        <span class="m-widget14__desc">
                                            {{trans('label.dashboard_user_registered_views_description')}}
                                        </span>
                                    </div>
                                    <div class="m-widget14__chart">
                                        <canvas id="user_views_week"></canvas>
                                    </div>
                                </div>
                                <!--end:: Widgets/Daily Sales-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    @php
        $count_data_views = implode(',',$views_count);
        $count_registered_user = implode(',',$registered_user_count);
    @endphp
    <script>var count_data_views = @php echo '[' . $count_data_views . ']'; @endphp</script>
    <script>var count_registered_user = @php echo '[' . $count_registered_user . ']'; @endphp</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" type="text/javascript"></script>
    <script src="{{ url('laraking/backend/js/chart_util.js') }}" type="text/javascript"></script>
    <script src="{{ url('laraking/backend/js/pages/dashboard.js') }}" type="text/javascript"></script>
@stop
