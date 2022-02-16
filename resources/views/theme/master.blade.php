<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>@yield('title')</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skin_color.css') }}">
    {{ asset('assets/css/style.css') }}
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
    <div id="loader"></div>

    @include('theme.components.header')

    @include('theme.components.sidebar')

    @yield('content')

    @include('theme.components.footer')

    @include('theme.components.controls')

</div>

    @include('theme.components.toolbar')

    @include('theme.components.chatbox')

<!-- Vendor JS -->
<script src="{{ asset('assets/js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/chat-popup.js') }}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
<script src="{{ asset('assets/vendor_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor_components/fullcalendar/fullcalendar.js') }}"></script>

<!-- EduAdmin App -->
<script src="{{ asset('assets/js/template.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('assets/js/pages/calendar.js') }}"></script>

</body>
</html>
