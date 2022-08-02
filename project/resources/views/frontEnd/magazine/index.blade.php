@extends('frontEnd.layouts.master')
@section('title')
    Magazines
@endsection
@section('head-tag')
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-reboot.rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/basic.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <!-- single -->
    <link rel="stylesheet" href="{{ asset('assets/css/single.css') }}" />
@endsection
@section('content')
    <!-- main  -->
    <main>
        <!-- container -->
        <div class="container-fluid">
        @include('frontEnd.header-menu')
        <!-- blog -->
            <div class="magazin">
                <div class="row justify-content-around my-3">
                    @foreach($magazines as $magazine)
                    <div class="col-2 m-2 main-box position-relative">
                        <div><img src="{{ asset($magazine->imageFile) }}" class="img-fluid magazin-img-box" alt=""></div>
                        <div class=" p-2">
                            <h2 class="monthly-title">{{ $magazine->title }}
                                <span>- {{ jalaliDate($magazine->publishDate, '%B %Y') }} </span>
                            </h2>
                        </div>
                        <p class="text-muted monthly-date  p-2">انتشار :
                            <span>{{ jalaliDate($magazine->publishDate, '%d %B %Y') }}</span>
                        </p>
                        <div class="download-box p-2 mt-2">
                            <a href="{{ route('downloadMagazine', $magazine->id) }}" class="btn-download d-inline-block">دریافت</a>
                        </div>


                        <div class="magazin-content-h p-2">
                            <h2 class="monthly-title">{{ $magazine->title }}
                                <span>- {{ jalaliDate($magazine->publishDate, '%B %Y') }} </span>
                            </h2>
                            <p class="text-muted monthly-date  p-2">انتشار :
                                <span>{{ jalaliDate($magazine->publishDate, '%d %B %Y') }}</span>
                            </p>
                            <p class="text-muted monthly-date  p-2">تعداد دانلود :
                                <span>3</span>
                            </p>
                            <span class=" p-2 d-inline-block content-title">عناوین محتوا</span>
                            <ul class="menu-magazni p-2">
                                @foreach(explode(",", $magazine->contentTitle) as $title)
                                <li class="sub-title">{{ $title }}</li>
                                @endforeach
                            </ul>
                            <div class="download-box p-2">
                                <a href="{{ route('downloadMagazine', $magazine->id) }}" class="btn-download d-inline-block">

                                    دریافت
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@endsection
