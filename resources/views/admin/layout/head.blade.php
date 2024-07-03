<head>
    <!-- BEGIN PAGE META DATA -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN PAGE META DATA -->

    <!-- BEGIN PAGE TAP TITLE & ICON -->
    <title>لوحة التحكم | @yield('tap-title')</title>
    <link rel="apple-touch-icon" href="{{asset('/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/app-assets/images/ico/favicon.ico')}}">
    <!-- END PAGE TAP TITLE & ICON -->

    <!-- BEGIN FONTS & ICONS CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap">
    <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/fonts/meteocons/style.css')}}">
    <!-- END FONTS CSS -->

    <!-- BEGIN VENDOR CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/vendors.css')}}">
    <!-- END VENDOR CSS -->

    <!-- BEGIN Page Level CSS -->
    @yield('page-style-files')
    <!-- END Page Level CSS -->

    <!-- BEGIN MODERN CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/custom-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    <!-- END MODERN CSS -->

    <!-- BEGIN OTHER CSS -->
    <link rel="stylesheet" type="text/css" href='{{asset("/assets/css/sweetalert.css")}}'>
    <link rel="stylesheet" type="text/css" href='{{asset("/app-assets/vendors/css/extensions/toastr.css")}}'>
    <link rel="stylesheet" type="text/css" href='{{asset("/app-assets/css/plugins/extensions/toastr.css")}}'>
    <!-- END OTHER CSS -->

    <!-- BEGIN Custom CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/style-rtl.css')}}">
    <!-- END Custom CSS -->

    @yield('styles')
</head>
