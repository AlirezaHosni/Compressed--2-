<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="index.html">
            <img src="{{asset('backEnd/img/brand/logo.png')}}" class="we-logo" height="50px " alt="لوگو" />
        </a>
    </div>
    <div class="main-sidebar-body">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">داشبورد</span></a>
            </li>
            <li class="nav-header"><span class="nav-label">مدیریت محتوا</span></li>

            <ul >
                <li class="nav-sub-link" >
                    <a class="nav-sub-link" href="{{route('article.index')}}"><i class="fa fa-newspaper-o fa-lg ml-2 text-warning"></i> مقالات</a>
                </li>
                <li class="nav-sub-item" >
                    <a class="nav-sub-link" href="{{route('analysis.index')}}"><i class="fa fa-newspaper-o fa-lg ml-2 text-warning"></i> تحلیل‌ها</a>
                </li>
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="{{route('landing.index')}}" ><i class="fa fa-newspaper-o fa-lg ml-2 text-warning"></i> صفحات لندینگ</a>
                </li>
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="{{route('comment.index')}}"> <i class="fa fa-comment fa-lg ml-2 text-warning"></i> نظرات مقالات</a>
                </li>
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="{{route('magazine.index')}}"><i class="fa fa-bar-chart fa-lg ml-2 text-warning"></i>  مجلات  </a>
                </li>
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="{{route('articleGroup.index')}}"><i class="fa fa-map fa-lg ml-2 text-warning"></i>  گروه مقالات  </a>
                </li>
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="{{route('menus.index')}}"><i class="fa fa-bars fa-lg ml-2 text-warning"></i>  منوی اصلی  </a>
                </li>
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="{{route('tags.index')}}"><i class="fa fa-tag fa-lg ml-2 text-warning"></i>  تگ ها  </a>
                </li>
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="{{route('advertise.index')}}"><i class="fa fa-bullhorn fa-lg ml-2 text-warning"></i>  تبلیغات</a>
                </li>
            </ul>


            <li class="nav-header"><span class="nav-label">کسب و کار</span></li>

            <ul>
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="{{route('userManagement.index')}}"><i class="fa fa-user fa-lg ml-2 text-warning"></i>  مدیریت کاربران</a>
                </li>


                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="{{route('role.index')}}"><i class="fa fa-comment fa-lg ml-2 text-warning"></i> نقش ها </a>
                </li>
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="{{route('permission.index')}}"><i class="fa fa-comment fa-lg ml-2 text-warning"></i> وظایف </a>
                </li>
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="./chat.html"><i class="fa fa-support fa-lg ml-2 text-warning"></i>  تیکت ها </a>
                </li>
            </ul>

            <li class="nav-item">
                <a class="nav-link with-sub" href="#">
                    <span class="shape1"></span><span class="shape2"></span><i class="ti-lock sidemenu-icon"></i><span class="sidemenu-label">صفحات سفارشی</span><i class="angle fe fe-chevron-left"></i>
                </a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="signin.html">ورود</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="signup.html">ثبت نام</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="forgot.html">رمز عبور را فراموش کرده اید</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="reset.html">بازنشانی گذرواژه</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="lockscreen.html">صفحه قفل</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="underconstruction.html">در دست ساخت</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="error404.html">خطای 404</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="error500.html">500 خطا</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
