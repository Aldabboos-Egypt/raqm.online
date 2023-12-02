<!DOCTYPE html>
<html lang="{{ Session::get('locale') }}" dir="{{ Session::get('locale') == 'ar' ? 'rtl' : 'ltr' }}">
{{-- @if (app()->getLocale() == 'ar') direction="rtl" dir="rtl" style="direction: rtl"
    @endif> --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Raqm Online - @yield('title')</title>

    @include('dashboard.layouts.css')

</head>

<body>

    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('dashboard.layouts.header')

        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('dashboard.layouts.sidebar')
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- Container-fluid Ends-->
            </div>
        </div>

        <!-- footer start-->
        {{-- @include('dashboard.layouts.footer') --}}
    </div>


    @include('dashboard.layouts.script')
    @include('vendor.sweetalert.alert')
    <script>
        $('.dataTables_wrapper').each(function() {
            $(this).parent().css('background-color', 'white');
            $(this).parent().css('box-shadow',
                'rgba(27, 31, 35, 0.04) 0px 1px 0px, rgba(255, 255, 255, 0.25) 0px 1px 0px inset;');
        });
    </script>



    <script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
    <script>
        {{-- var $disabledResults = $(".search-select");
        $disabledResults.select2();

        $('a').each(function() {
            var href = $(this).attr('data-href');
            if (href) {
                href = href.replace('http:', 'https:');
                $(this).attr('data-href', href);
            }
        });

        $('form').each(function() {
            var action = $(this).attr('action');
            if (action) {
                action = action.replace('http:', 'https:');
                $(this).attr('action', action);
            }
        });

        document.addEventListener('click', function() {
            $('form').each(function() {
                var action = $(this).attr('action');
                if (action) {
                    action = action.replace('http:', 'https:');
                    $(this).attr('action', action);
                }
            });
        }) --}}
    </script>

    {{-- <script>
        $('input[name="dates"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });
    </script> --}}


</body>

</html>
