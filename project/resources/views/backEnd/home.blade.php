
<!-- Header   -->
@include('backEnd.partial._header')
<!-- Header   -->
<body class="main-body leftmenu">
<!-- Loader -->
@include('backEnd.partial._loader')
<!-- End Loader -->
<!-- Page -->
<div class="page">
    <!-- Sidemenu -->
    @include('backEnd.partial._sideMenu')
    <!-- End Sidemenu -->
    <!-- Main Header-->
    @include('backEnd.partial._mainHeader')
    <!-- End Main Header-->
    <!-- Mobile-header -->
    @include('backEnd.partial._mobileHeader')
    <!-- Mobile-header closed -->
    <!-- Main Content-->
    @include('backEnd.partial._mainContent')
    <!-- End Main Content-->
    <!-- Main Footer-->
    @include('backEnd.partial._mainFooter')
    <!--End Footer-->
</div>
<!-- End Page -->
<!-- Back-to-top -->
@include('backEnd.partial._backToTop')
<!-- End Back-to-top -->

<!-- Script -->
@include('backEnd.partial._script')
<!-- End Script -->

</body>

