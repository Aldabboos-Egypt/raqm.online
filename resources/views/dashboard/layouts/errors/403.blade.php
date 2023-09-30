<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>403</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="{{url('admin')}}/assets/css/pages/error/error-6.css" rel="stylesheet" type="text/css" />
    <link href="{{url('admin')}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{url('admin')}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{url('admin')}}/assets/css/style-ar.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset($setting->where('key', 'favicon')->first()->val) }}" />
</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<div class="d-flex flex-column flex-root">
    <div class="error error-6 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url({{url('admin/assets/media/errors/bg6.jpg')}});">
        <div class="d-flex flex-column flex-row-fluid text-center">
            <h3 class="error-title font-weight-boldest text-white mb-12" style="margin-top: 12rem; font-size: 5rem !important;">403</h3>
            <p class="display-4 font-weight-bold text-white">{{ __('lang.error_403_m1') }}
                <br/>
                {{ __('lang.error_403_m2') }}

            </p>
            <a href="{{ route('dashboard') }}" style="width: 10%; margin:5% auto" class="btn btn-warning"> {{ __('lang.go_to_home') }}</a>
        </div>
    </div>
</div>
</body>
</html>
