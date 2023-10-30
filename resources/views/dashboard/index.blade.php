@extends('dashboard.layouts.master')

@section('content')
    <div class="row pt-4 m-0">

        <div class="col-6">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 mb-2">
                    <div class="card small-widget mb-sm-0">
                        <div class="card-body primary"> <span class="f-light">{{ __('lang.categories') }}</span>
                            <div class="d-flex align-items-end gap-1">
                                <h4>{{ $data['category'] }}</h4>
                            </div>
                            <div class="bg-gradient">
                                <svg class="stroke-icon svg-fill svg-fill">
                                    <use href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-learning">
                                    </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 mb-2">
                    <div class="card small-widget mb-sm-0">
                        <div class="card-body primary"> <span class="f-light">{{ __('lang.clinics') }}</span>
                            <div class="d-flex align-items-end gap-1">
                                <h4>{{ $data['clinics'] }}</h4>
                            </div>
                            <div class="bg-gradient">
                                <svg class="stroke-icon svg-fill svg-fill">
                                    <use href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-table">
                                    </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 mb-2">
                    <div class="card small-widget mb-sm-0">
                        <div class="card-body primary"> <span class="f-light">{{ __('lang.clinic_requests') }}</span>
                            <div class="d-flex align-items-end gap-1">
                                <h4>{{ $data['clinic_requests'] }}</h4>
                            </div>
                            <div class="bg-gradient">
                                <svg class="stroke-icon svg-fill">
                                    <use href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-table">
                                    </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 mb-2">
                    <div class="card small-widget mb-sm-0">
                        <div class="card-body primary"> <span class="f-light">{{ __('lang.clinic_comments') }}</span>
                            <div class="d-flex align-items-end gap-1">
                                <h4>{{ $data['clinic_comments'] }}</h4>
                            </div>
                            <div class="bg-gradient">
                                <svg class="stroke-icon svg-fill">
                                    <use href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-table">
                                    </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 mb-2">
                    <div class="card small-widget mb-sm-0">
                        <div class="card-body primary"> <span class="f-light">{{ __('lang.geographics') }}</span>
                            <div class="d-flex align-items-end gap-1">
                                <h4>{{ $data['geographicdata'] }}</h4>
                            </div>
                            <div class="bg-gradient">
                                <svg class="stroke-icon svg-fill">
                                    <use href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-maps">
                                    </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 mb-2">
                    <div class="card small-widget mb-sm-0">
                        <div class="card-body primary"> <span class="f-light">{{ __('lang.adds') }}</span>
                            <div class="d-flex align-items-end gap-1">
                                <h4>{{ $data['adds'] }}</h4>
                            </div>
                            <div class="bg-gradient">
                                <svg class="stroke-icon svg-fill">
                                    <use href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-gallery">
                                    </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 mb-2">
                    <div class="card small-widget mb-sm-0">
                        <div class="card-body primary"> <span class="f-light">{{ __('lang.subcategories') }}</span>
                            <div class="d-flex align-items-end gap-1">
                                <h4>{{ $data['subcategory'] }}</h4>
                            </div>
                            <div class="bg-gradient">
                                <svg class="stroke-icon svg-fill">
                                    <use href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-widget">
                                    </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 mb-2">
                    <div class="card small-widget mb-sm-0">
                        <div class="card-body primary"> <span class="f-light">{{ __('lang.admins') }}</span>
                            <div class="d-flex align-items-end gap-1">
                                <h4>{{ $data['admin'] }}</h4>
                            </div>
                            <div class="bg-gradient">
                                <svg class="stroke-icon svg-fill">
                                    <use href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-user">
                                    </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 mb-2">
                    <div class="card small-widget mb-sm-0">
                        <div class="card-body primary"> <span class="f-light">{{ __('lang.roles') }}</span>
                            <div class="d-flex align-items-end gap-1">
                                <h4>{{ $data['role'] }}</h4>
                            </div>
                            <div class="bg-gradient">
                                <svg class="stroke-icon svg-fill">
                                    <use href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-social">
                                    </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

        <div class="col-6">
            <div class='row m-0'>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h5>{{ __('lang.clinic_requests') }}</h5>

                            </div>
                        </div>
                        <div class="card-body py-lg-3">
                            <ul class="user-list">
                                <li>
                                    <div class="user-icon primary">
                                        <div class="user-box"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-user-plus font-primary">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                                <line x1="23" y1="11" x2="17" y2="11">
                                                </line>
                                            </svg></div>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">{{ $data['approved'] }}</h5><span
                                            class="font-primary d-flex align-items-center"><i
                                                class="icon-arrow-up icon-rotate me-1"> </i><span
                                                class="f-w-500">{{ __('lang.approved') }}</span></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="user-icon success">
                                        <div class="user-box"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-user-minus font-success">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="23" y1="11" x2="17" y2="11">
                                                </line>
                                            </svg></div>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">{{ $data['rejected'] }}</h5><span
                                            class="font-danger d-flex align-items-center"><i
                                                class="icon-arrow-down icon-rotate me-1"></i><span
                                                class="f-w-500">{{ __('lang.rejected') }}</span></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="card visitor-card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h5 class="m-0">{{ __('lang.views_per_month') }}<span
                                        class="f-14 font-primary f-w-500 ms-1">
                                        <svg class="svg-fill me-1">
                                            <use href="../assets/svg/icon-sprite.svg#user-visitor"></use>
                                        </svg>({{ DB::table('clinic_views')->count() }})</span></h5>
                                <div class="card-header-right-icon">

                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div class="visitors-container">
                                <div id="visitor-chart" style="min-height: 285px;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/chart-custom.js') }}"></script>

    <script>
        var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: '{{ __('lang.views_per_month') }}',
                data: [
                    @foreach ($data['chart'] as $row)
                        {{ $row->total ?? 0 }},
                    @endforeach
                ]
            }],
            xaxis: {
                categories: [
                    @foreach ($data['chart'] as $row)
                        '{{ $row->title }}',
                    @endforeach
                ]
            }
        }

        var chart = new ApexCharts(document.querySelector("#visitor-chart"), options);

        chart.render();
    </script>
@endsection
