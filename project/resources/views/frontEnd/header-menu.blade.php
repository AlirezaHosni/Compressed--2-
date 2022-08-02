<!-- header -->
<header class="index-header border-bottom">
    <!-- row -->
    <div class="row justify-content-between p-4">
        <!-- logo -->
        <div class="logo d-flex col-2">
            <i class="fa fa-bars menu-bar-icon" id="menubar-icon" aria-hidden="true"></i>
            <img src="{{ asset('assets/imgs/icon/logo.png') }}" class="img-fluid" alt="">
        </div>
        <!-- search and login box -->
        <div class="search-login-box d-flex justify-content-end p-3 col-4">
            <!-- search -->
            <div class="search">
                <form action="" class="d-flex search-form form-control">
                    <div class="search-text">
                        <input type="text" placeholder="کلمه مورد نظر">
                    </div>
                    <div class="search-icon" id="search-icon">
                        <img src="{{ asset('assets/imgs/icon/search icon.png') }}" class="img-fluid" alt="">
                    </div>
                </form>
            </div>
            <!-- login -->
            <div>
                <!-- login-button -->
                <a href="{{ route('login') }}"  class="login-button">
                    <!-- login-img -->
                    <img src="{{ asset('assets/imgs/icon/users.png') }}" class="img-fluid" alt="">
                </a>
            </div>
        </div>
        <div class="text-search-box">
            <form action="">
                <input type="text" class="text-search-sm">
            </form>

        </div>
    </div>
</header>
<!-- nav top -->
<nav class="navbar navbar-expand-lg mt-2 rounded justify-content-center" id="nav-index">
    <ul class="navbar-nav">
        @each('frontEnd.submenu', $menuListHeader, 'menu')
    </ul>

</nav>

<!-- nav bottom -->
<nav class="navbar navbar-sm navbar-expand-lg bg-light mt-2 rounded justify-content-center">
    <a class="navbar-brand text-weight-bold text-dark" href="{{ url('#') }}">دسترسی سریع</a>
    <ul class="navbar-nav">
        @each('frontEnd.submenu-quick-access', $menuListQuickAccess, 'menu')
    </ul>

</nav>
