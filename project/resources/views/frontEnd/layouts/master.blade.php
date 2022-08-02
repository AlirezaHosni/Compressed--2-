<!DOCTYPE html>
<html lang="en" dir="rtl">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
    <meta name="description" content="Spruha -  Admin Panel laravel Dashboard Template" />
    <meta name="author" content="Spruko Technologies Private Limited" />
    <meta
        name="keywords"
        content="admin laravel template, template laravel admin, laravel css template, best admin template for laravel, laravel blade admin template, template admin laravel, laravel admin template bootstrap 4, laravel bootstrap 4 admin template, laravel admin bootstrap 4, admin template bootstrap 4 laravel, bootstrap 4 laravel admin template, bootstrap 4 admin template laravel, laravel bootstrap 4 template, bootstrap blade template, laravel bootstrap admin template"
    />
    <!-- Favicon -->
    <link rel="icon" href="{{asset('backEnd/img/brand/logo.png')}}" type="image/x-icon" />
    <!-- Title -->
    <!-- Bootstrap css-->
    <link href="{{asset('backEnd/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Icons css-->
    <link href="{{asset("backEnd/plugins/web-fonts/icons.css")}}" rel="stylesheet" />
    <link href="{{asset('backEnd/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('backEnd/plugins/web-fonts/plugin.css')}}" rel="stylesheet" />
    <!-- Style css-->
    <link href="{{asset('backEnd/css-rtl/style/style.css')}}" rel="stylesheet" />
    <link href="{{asset('backEnd/css-rtl/skins.css')}}" rel="stylesheet" />
    <link href="{{asset('backEnd/css-rtl/dark-style.css')}}" rel="stylesheet" />
    <link href="{{asset('backEnd/css-rtl/colors/default.css')}}" rel="stylesheet" />
    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('backEnd/css-rtl/colors/color.css')}}" />
    <!-- Select2 css -->
    <link href="{{asset('backEnd/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <!-- Switcher css-->
    <link href="{{asset('backEnd/switcher/css/switcher-rtl.css')}}" rel="stylesheet" />
    <link href="{{asset('backEnd/switcher/demo.css')}}" rel="stylesheet" />
    <link href="{{asset('frontEnd/style/custom.css')}}" rel="stylesheet" />
    @yield('head-tag')
</head>

<body>
@yield('content')

<!-- Jquery js-->
<script src="{{asset('backEnd/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('backEnd/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('backEnd/plugins/bootstrap/js/bootstrap-rtl.js')}}"></script>
<!-- Select2 js-->
<script src="{{asset('backEnd/plugins/select2/js/select2.min.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('backEnd/js/custom.js')}}"></script>
<!-- Switcher js -->
<script src="{{asset('backEnd/switcher/js/switcher-rtl.js')}}"></script>
@include('frontEnd.footer')
@yield('js')
</body>
</html>
