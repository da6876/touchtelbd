
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TouchTelBD @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
    <meta name="author" content="Pike Web Development - https://www.pikephp.com">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap CSS -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Switchery css -->
    <link href="{{asset('public/assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet" />

    <!-- Font Awesome CSS -->
    <link href="{{asset('public/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <!-- END CSS for this page -->
    <!-- BEGIN CSS for this page -->
    <link href="{{asset('public/assets/plugins/datetimepicker/css/daterangepicker.css')}}" rel="stylesheet" />

    <!-- BEGIN CSS for this page -->
    <link href="{{asset('public/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END CSS for this page -->
</head>
