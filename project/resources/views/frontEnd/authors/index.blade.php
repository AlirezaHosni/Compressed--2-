@extends('frontEnd.layouts.master')
@section('title')
    authors
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
        <div class="row px-5 flex-nowrap box-shadow">
            <div class="col-xl-9">
                <div class="divider"></div>
                <div class="row">
                        @foreach($authors as $author)
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-3">
                            <div class="media-article pt-2 border pt-2 pb-2">
                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="{{ route('authors.show', $author->id) }}">
                                            <img class="user-analysis-img" src="{{ asset($author->image) }}">
                                        </a>
                                    </div>
                                    <div class="col-md-7 d-flex">
                                        <div class="my-auto user-analysis">
                                            <a href="{{ route('authors.show', $author->id) }}">
                                                <h6>
                                                    {{ $author->name }}
                                                </h6>
{{--                                                    <p>--}}
{{--                                                        یاشار--}}
{{--                                                        سلجوقی--}}
{{--                                                    </p>--}}
                                                <span>
                                                    تعداد تحلیل ها: {{ count($author->analysis) }}
                                                </span>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
@section('js')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@endsection
