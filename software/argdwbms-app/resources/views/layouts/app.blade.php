<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../images/favicon.ico">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Vendors Style-->
        <link rel="stylesheet" href="{{ asset('css/vendors_css.css') }}">

        <!-- Style-->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">
    </head>

    <body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
        <div class="wrapper">

        @include('layouts.header')

        {{-- @include('layouts.sidebar') --}}

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Main content -->
                <section class="content">
                    {{ $slot }}
                </section>
                <!-- /.content -->
            </div>
        </div>

        @include('layouts.footer')

        @include('layouts.control')

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->

        <!-- Vendor JS -->
        <script src="{{ asset('js/vendors.min.js') }}"></script>
        <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
        <script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
        <script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>

        <!-- Sunny Admin App -->
        <script src="{{ asset('js/template.js') }}"></script>
        <script src="{{ asset('js/pages/dashboard.js') }}"></script>
    </body>
</html>