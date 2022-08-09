@extends('frontEnd.layouts.master')
@section('title')
    landing
@endsection
@section('head-tag')
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-reboot.rtl.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.rtl.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/basic.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/index-style.css') }}"/>
    <!-- single -->
    <link rel="stylesheet" href="{{ asset('assets/css/single.css') }}"/>
@endsection
@section('content')
    <!-- main  -->
    <main>
        <!-- container -->
        <div class="container-fluid">
        @include('frontEnd.layouts.tiny-header-menu')
        <!-- meeting -->
            <div class="meeting mb-5">
                <div class="row">
                    <div
                        class="col-12 meeting-login py-3 px-3 d-flex justify-content-end position-sticky"
                    >
                        <a href="{{ route('login') }}" class="d-inline-block mx-2 p-2">
                            <i class="fa fa-user"></i>
                        </a>
                        <a href="#" class="d-inline-block mx-2 p-2" id="btn-search">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <div>
                            <img src="{{ asset($landing->imageBackground) }}" alt=""/>
                        </div>
                    </div>

                    <div class="position-relative overbox">
                        <div class="position-absolute overbox-content">
                            <img src="{{ asset($landing->imageFile) }}" alt=""/>
                            <a href="#" class="overlink">
                                <h2>
                                    {{ $landing->title }}
                                    | {{ Carbon\Carbon::parse($landing->publishDate)->format('Y M d') }}
                                </h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-3 px-4 position-relative">
                        <div class="row bg-white br-5rem">
                            <!-- famous brogers -->
                            @include('frontEnd.layouts.brogers')
                        </div>
                        @include('frontEnd.layouts.advertise')
                    </div>
                    <!--  -->
                    <div class="col-xl-6">
                        <div class="box-shadow bg-white">
                            <div class="row mt-2">
                                <div class="col-xl-11 mx-auto px-sm-15">
                                    <!-- START Story-Content -->
                                    <div class="story-content px-sm-15">
                                        <h3
                                            dir="RTL"
                                            class="article-p"
                                        >
                                            &nbsp;
                                        </h3>

                                        <p dir="RTL">&nbsp;</p>

                                        <p dir="RTL" class="t-center">
                                            {{ $landing->titleTwo }} صفحه را تا پایین مطالعه کنید
                                        </p>

                                        <hr/>
                                        <p dir="RTL">&nbsp;</p>
                                        {!! $landing->mainContent !!}
                                    </div>
                                    <div class="col-12 py-3">
                <span class="d-block"
                >
                <strong class="resource">

                    منبع:

                    {{ $landing->source }}
                </strong>



                </span>
                                        <span class="d-block">
                    برچسب ها
                            @if(!is_null($landing->tag))
                                                @foreach(explode(",", $landing->tag) as $singleTag)
                                                    <a href="{{ url('#') }}" class="btn-resource">{{ $singleTag }}</a>
                                                @endforeach
                                            @endif
                            </span>
                                    </div>

                                    <div class="divider"></div>

                                    <div
                                        class="col-xl-12 col-lg-12 col-md-11 col-sm-12 col-12 mx-auto markets p-0"
                                    >
                                        <h1 class="bold-title">بانک ها</h1>
                                        <div class="row">
                                            <!-- START .col-xl-9 -->
                                            <div class="col-lg-12">
                                                <div class="row">
                                                @foreach($bankArticles as $bankArticle)
                                                    <!-- START .col-xl-4 #1-->
                                                        <div class="col-lg-4 col-md-4 col-sm-6 mx-auto">
                                                            <div class="news-box">
                                                                <div class="news-box-img">
                                                                    <a href="{{ route('singleArticle', $bankArticle->id) }}"
                                                                    ><img
                                                                            src="{{ asset($bankArticle->image) }}"
                                                                            class="img-fluid"
                                                                        /></a>
                                                                </div>
                                                                <div class="news-box-headline">
                                                                    <a class="text-dark" href="{{ route('singleArticle', $bankArticle->id) }}">
                                                                        <p class="news-box-title font-weight-bold">
                                                                            {{ $bankArticle->title }}
                                                                        </p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END .col-xl-4 #1-->
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-3 border-radius-5rem">
                        @include('frontEnd.layouts.popular-articles')
                        @include('frontEnd.layouts.advertise')
                    </div>
                </div>
            </div>
            <div class="modal show " id="searchModal" style="display: block; padding-right: 17px;">
                <div class="close-search-modal">
                    <div class="line line-left"></div>
                    <div class="line line-right"></div>
                </div>

                <div class="col-xl-8 col-lg-8 col-sm-8 col-md-8 col-11 mx-auto pb-5 mb-5">
                    <div class="input-group modal-search-area">
                        <input type="text" id="search-input" class="form-control" placeholder="جستجو"
                               onkeyup="search()">
                        <div class="input-group-append">
                            <button class="btn p-0" type="submit">
                                <svg class="svg-inline--fa btn-search-n fa-search fa-w-16" aria-hidden="true"
                                     focusable="false" data-prefix="fa" data-icon="search" role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                          d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                                </svg><!-- <i class="fa fa-search"></i> --></button>
                        </div>
                    </div>
                    <div class="col-sm-12" id="search-result"></div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <Script>
        $("#searchModal").css('display', 'none')
        $(".close-search-modal").click(function () {
            $("#searchModal").fadeOut(400);
        });

        $("#btn-search").click(function () {
            $("#searchModal").fadeIn(400);
        });
    </Script>
@endsection
