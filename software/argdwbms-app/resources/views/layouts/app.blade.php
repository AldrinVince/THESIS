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

    @stack('styles')

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        {{ $slot }}

    </div>
    <!-- ./wrapper -->

    <!-- Vendor JS -->
    <script src="{{ asset('js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/perfect-scrollbar-master/perfect-scrollbar.jquery.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/fullcalendar/lib/moment.min.js') }}"></script>
    <script src="{{ asset('assets/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/fullcalendar/fullcalendar.min.js') }}"></script>

    <!-- Sunny Admin App -->
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/calendar.js') }}"></script>

    @stack('scripts')

</body>

</html>
