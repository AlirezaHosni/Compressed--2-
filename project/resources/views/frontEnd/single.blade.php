@extends('frontEnd.layouts.master')
@section('title')
    {{ $article->title }}
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
    <link rel="stylesheet" href="{{ asset('assets/css/index-style.css') }}" />
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
            <div class="row px-5 flex-nowrap box-shadow">
                <div class="col-9 p-4 ">
                    <div class="row bg-white">
                        <div class="col-12 py-3 px-5">
                            <a href="{{ url($article->article_group->url) }}" class="bank">{{ $article->article_group->title }}</a>
                        </div>
                        <div class="col-12 py-3 px-5">
                            <h2 class="main-titr">{{ $article->title }} - {{ Carbon\Carbon::parse($article->publishDate)->format('Y M d') }}</h2>
                        </div>
                        <div class="col-12 row align-items-center  py-3 px-5">
                            <div class="col-2"><img src="{{ asset($article->user->image) }}" class="img-fluid box-shadow writter-img" alt="" /></div>
                            <div class="col-10">
                                <p>
                                    <span class="text-muted font-weight-normal">?????????????? : {{ $article->user->name }}</span>
                                </p>
                                <p>
                                    <span class="text-muted font-weight-normal"> {{ jalaliDate($article->publishDate, '%A, %d %B') }}</span>
                                    <span class="text-muted font-weight-normal">?????????? ?????????? :  {{ count(explode(' ', strip_tags($article->mainContent))) }}</span>
                                    <span class="text-muted font-weight-normal"> ?????? ???????? ???????????? : 3 ??????????</span>
                                    <span class="text-muted font-weight-normal"> ?????????? ???????????? : {{ $article->visit_number }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-12 py-0 px-5 position-relative">
                            <div class="comment-counter-box">
                                <a href="#" class="comment-counter">{{ count($comments) }}</a>
                            </div>
                        </div>
                        <div class="col-12 p-0 mt-2">
                            <img src="{{ asset($article->image) }}" class="img-fluid main-img" alt="" />
                        </div>
                        <div class="col-12 py-3 px-5 position-relative titr-empty">
                            <span class="d-inline-block position-absolute border">??????????</span>
                        </div>
{{--                        <div class="col-12 pt-5 pb-3 px-5 titr-links-box">--}}
{{--                            <a href="#" class="d-block btn-titr-head position-relative">?????????? ???????????????? ?????????? ????????</a>--}}
{{--                            <a href="#" class="d-block btn-titr-head position-relative">?????? ???????? ???? ???? ???? ??????????</a>--}}
{{--                        </div>--}}
                        <div class="col-12 py-3 px-5 d-flex justify-content-center align-items-center">
                            <a href="#" class="social-media"><img src="{{ asset('assets/imgs/icon/Facebook_f_logo_(2019).svg.png') }}" alt=""></a>
                            <a href="#" class="social-media "><img src="{{ asset('assets/imgs/icon/Telegram_2019_Logo.svg.png') }}" alt=""></a>
                            <a href="#" class="social-media twitter"><img src="{{ asset('assets/imgs/icon/697029-twitter-512.png') }}" alt=""></a>
                            <a href="#" class="social-media"><img src="{{ asset('assets/imgs/icon/LinkedIn_icon_circle.svg.png') }}" alt=""></a>

                        </div>
                        <div class="col-12 py-3 px-5">
                            {!! $article->mainContent !!}
                        </div>
                        <div class="col-12 py-3 px-5">
                <span class="d-block"
                >
                <strong class="resource">

                    ????????:

                    {{ $article->source }}
                </strong>



                </span>
                            <span class="d-block">
                    ?????????? ????
                            @if(!is_null($article->tag))
                                @foreach(explode(",", $article->tag) as $singleTag)
                                    <a href="{{ url('#') }}" class="btn-resource">{{ $singleTag }}</a>
                                @endforeach
                            @endif
                            </span>
                        </div>

                        <div class="divider"></div>
                        <!-- -**************** -->
                        <div class="conversation mt-2">
                            <h5 class="conversation-title mb-4 latobold"><span>?????????? ?????????????? {{ count($comments) }} </span></h5>
                            @foreach($comments as $comment)
                                <div class="article-headline border-0">
                                    <h2 class="mb-2 font-16">
                                        {{ $comment->fullName }} :
                                    </h2>
                                    <div class="stream-text font-14">
                                        <p><span style="font-size:14px; text-align:justify">{{ $comment->comment }}</span></p>
                                    </div>
                                </div>
                                <hr class="mt-0">
                            @endforeach

                            <form action="{{ route('comment.storeComment', [$article->id, 0]) }}" method="post" novalidate="novalidate"><input data-val="true" data-val-required="???????? ???????? ?????????? ???? ???????? ????????????." id="Uri" name="Uri" type="hidden" value="5058">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 my-3">
                                        <input class="form-control text-box single-line" data-val="true" data-val-maxlength="The field ??????  must be a string or array type with a maximum length of '100'." data-val-maxlength-max="100" data-val-required="???????? ??????  ???? ???????? ????????????." id="Name" name="fullName" placeholder="??????" type="text" value="">
                                        <span class="field-validation-valid help-block with-errors" data-valmsg-for="Name" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="form-group col-md-6 my-3">
                                        <input class="form-control text-box single-line" data-val="true" data-val-maxlength="The field ?????????? must be a string or array type with a maximum length of '150'." data-val-maxlength-max="150" data-val-required="???????? ?????????? ???? ???????? ????????????." id="Email" name="email" placeholder="??????????" type="text" value="">
                                        <span class="field-validation-valid help-block with-errors" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                                    </div>

                                    <div class="form-group col-md-12 mb-0">
                                        <textarea class="form-control h-100 text-box multi-line" data-val="true" data-val-maxlength=" ??????   ?????????? ???? 2000 ?????????????? ??????????????????? ????????." data-val-maxlength-max="2000" data-val-required="???????? ??????  ???? ???????? ????????????." id="Text" name="Text" placeholder="?????? ??????" rows="4" style="height: 62px;"></textarea>
                                        <span class="field-validation-valid help-block with-errors" data-valmsg-for="Text" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="text-right my-3">
                                            <button class="btn send-msg btn-primary">?????? ??????</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-3 p-4 position-relative">
                    <div class="row bg-white ">
                        @include('frontEnd.layouts.brogers')
                        @include('frontEnd.layouts.popular-articles')
                    </div>
                    @include('frontEnd.layouts.advertise')
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@endsection
