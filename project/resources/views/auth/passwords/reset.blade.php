@extends('frontEnd.layouts.master')
@section('content')
    <body class="main-body leftmenu">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{asset('backEnd\img\loader.svg')}}" class="loader-img" alt="Loader">
    </div>
    <!-- End Loader -->


    <!-- Page -->
    <div class="page main-signin-wrapper">

        <!-- Row -->
        <div class="row signpages text-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="row row-sm">
                        <div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
                            <div class="mt-5 pt-4 p-2 pos-absolute">
                                <img src="{{asset('backEnd/img/brand/logo.png')}}" height="50px" class="header-brand-img mb-4"
                                     alt="logo">
                                <div class="clearfix"></div>
                                <img src="{{asset('backEnd/img/svgs/user.svg')}}" class="ht-100 mb-0" alt="user">
                                <h5 class="mt-4 text-white">حساب کاربری برای خود بسازید</h5>
                                <span class="tx-white-6 tx-13 mb-5 mt-xl-0">برای ایجاد ، کشف و ارتباط با جامعه جهانی ثبت نام کنید</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
                            <div class="container-fluid">
                                <div class="row row-sm">
                                    <div class="card-body mt-2 mb-2">
                                        <img src="{{asset('backEnd/img/svgs/user.svg')}}"
                                             class=" d-lg-none header-brand-img text-left float-left mb-4" alt="logo">
                                        <div class="clearfix"></div>
                                        <form action="{{route('password.update')}}" method="post">
                                            @csrf
                                            <h5 class="text-right mb-2">رمز عبور خود را بازیابی کنید</h5>
                                            <p class="mb-4 text-muted tx-13 ml-0 text-right">می توانید گذرواژه خود را دوباره تنظیم کنید</p>
                                            <div class="form-group text-right">
                                                <label>آدرس ایمیل</label>
                                                <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="آدرس ایمیل خود را وارد کنید"
                                                       type="text">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group text-right">
                                                <label>کلمه عبور</label>
                                                <input class="form-control" name="password" placeholder="رمز ورود خود را وارد کنید"
                                                       type="password">
                                                @if( $errors->has('password'))
                                                    <div class="error">{{$errors->first('password')}}</div>
                                                @endif
                                            </div>
                                            <div class="form-group text-right">
                                                <label>تکرار کلمه عبور</label>
                                                <input class="form-control" name="password_confirmation" placeholder="رمز ورود خود را وارد کنید"
                                                       type="password">
                                                @if( $errors->has('password'))
                                                    <div class="error">{{$errors->first('password')}}</div>
                                                @endif
                                            </div>
                                            <button class="btn ripple btn-main-primary btn-block">بازنشانی گذرواژه</button>
                                        </form>
                                        <div class="text-right mt-5 ml-0">
                                            <div class="mb-1"><a href="{{ route('login') }}">ورود به حساب کاربری</a></div>
                                            <div><a href="{{ route('password.request') }}">بازیابی کلمه عبور</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->

    </div>
    <!-- End Page -->
@endsection
