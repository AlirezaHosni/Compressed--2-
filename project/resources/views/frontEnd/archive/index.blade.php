@extends('frontEnd.layouts.master')
@section('title')
    {{ $title }} Archive
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
        <div class="row px-5 flex-nowrap box-shadow">
          <div class="col-9 p-4 ">
            <div class="divider"></div>
            <div class="row my-5">
                @foreach($articles as $article)
              <div class="col-6 mb-3">
                <div class="row">
                  <div class="col-6 content-box">
                    <img src="{{ asset($article->image) }}" class="img-fluid metavers-img-box" alt="">
                  </div>
                  <div class="col-6 content-title-box d-flex align-items-center justify-content-center">
                    <a class="text-dark" href="{{ route('singleArticle', $article->url) }}">
                      <h2>
                      {{ $article->title }}
                      </h2>
                    </a>
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
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@endsection
