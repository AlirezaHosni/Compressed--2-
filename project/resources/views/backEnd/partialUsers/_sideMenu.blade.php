<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="index.html">
            <img src="{{asset('backEnd/img/brand/logo.png')}}" class="we-logo" height="50px " alt="لوگو" />
        </a>
    </div>
    <div class="main-sidebar-body">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">داشبورد</span></a>
            </li>
            <li class="nav-header"><span class="nav-label">مدیریت محتوا</span></li>

            <ul >
                @role('نویسنده')
                <li class="nav-sub-link" >
                    <a class="nav-sub-link" href="{{route('article.index')}}"><i class="fa fa-newspaper-o fa-lg ml-2 text-warning"></i> مقالات</a>
                </li>
                @endrole
                @can('تحلیلگر')
                <li class="nav-sub-item" >
                    <a class="nav-sub-link" href="{{route('analysis.index')}}"><i class="fa fa-newspaper-o fa-lg ml-2 text-warning"></i> تحلیل‌ها</a>
                </li>
                @endcan
            </ul>
        </ul>
    </div>
</div>
