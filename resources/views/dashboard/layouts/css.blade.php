<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

{{-- <link rel="icon" href="{{asset($lightLogoImg)}}" type="image/x-icon"> --}}
<link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
<title>Raqm Online</title>
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
    rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/font-awesome.css">
<!-- ico-font-->
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/vendors/icofont.css">
<!-- Themify icon-->
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/vendors/themify.css">
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/vendors/flag-icon.css">
<!-- Feather icon-->
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/vendors/feather-icon.css">
<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/vendors/scrollbar.css">
<!-- Plugins css Ends-->
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/vendors/bootstrap.css">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/style.css">
<link id="color" rel="stylesheet" href="{{ url('/') }}/assets/css/color-1.css" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/responsive.css">
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.bootstrap5.min.css">
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.min.css"
    integrity="sha512-yX1R8uWi11xPfY7HDg7rkLL/9F1jq8Hyiz8qF4DV2nedX4IVl7ruR2+h3TFceHIcT5Oq7ooKi09UZbI39B7ylw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- Button Switch  --}}
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/switchrey/toggle-switchy.css') }}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


{{-- data table --}}
<link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap');
</style>
<style>
    *,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Rubik', 'Tajawal', sans-serif;
    }

    .dash-border {
        border: 1px dashed #cdc6c6;
        padding: 10px;
    }

    .border-8 {
        border-radius: 8px;
    }

    .card .card-header .card-header-right {
        top: 5px !important
    }

    .bg-gray {
        background: rgb(179, 174, 174);
    }

    .feather-15 {
        width: 15px !important;
        height: 15px !important;
    }

    .feather-18 {
        width: 18px !important;
        height: 18px !important;
    }
</style>

@yield('css')

<style>
    .text_view {
        padding: 10px;
        border: 1px dashed #ccc;
        margin-top: 10px;
        margin-bottom: 15px;
    }

    .text_view strong {
        font-weight: bold;
    }

    .text_view p {
        margin-bottom: 0;
    }

    .modal {
        background: #00000061 !important;
    }

    .customizer-links {
        display: none !important;
    }

    .sidebar-links {

        margin-top: 0px !important;
        overflow: auto !important;
        height: 84vh !important;
    }


    .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper {
        height: 100vh;
    }

    .sidebar-wrapper {
        width: 220px !important;
    }

    .page-wrapper.compact-wrapper .page-body-wrapper .page-body {
        margin-left: 220px !important;
    }

    html[dir=rtl] .page-wrapper.compact-wrapper .page-body-wrapper .page-body {
        margin-left: unset !important;
        margin-right: 220px !important;
    }


    .page-wrapper.compact-wrapper .page-header {
        margin-left: 220px !important;
        width: calc(100% - 220px) !important;
    }


    html[dir=rtl] .page-wrapper.compact-wrapper .page-header {
        margin-right: 220px !important;
        margin-left: unset !important;
        width: calc(100% - 220px) !important;
    }
</style>
