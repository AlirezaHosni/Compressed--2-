@extends('frontEnd.layouts.master')
@section('title')
    analysis
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
          <div class="col-9 p-4 ">
            <div class="row">
                <div>
                    <div class="rounded align-items-center box-shadow py-3">
                            <a href="{{ route('authors.index') }}">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 text-md-start text-center">
                                        @foreach($authors as $author)
                                            <a href="{{ route('authors.show', $author->id) }}"><img src="{{ asset($author->image) }}" class="avatar avatar-small rounded-circle mx-auto " alt=""></a>
                                        @endforeach
                                    </div><!--end col-->
                                    <div class="col-lg-6 col-md-6 d-flex">
                                        <div class="row align-items-end my-auto">
                                            <div class="text-md-start text-center mt-4 mt-sm-0">
                                                <h3 class="title mb-0">
                                                    <span class=" fw-bold">
                                                        مشاهده لیست تحلیلگرها
                                                         
                                                        <svg class="svg-inline--fa fa-arrow-left fa-w-14" style="height: 20px;" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"></path></svg><!-- <i class="fa fa-arrow-left"></i> -->
                                                    </span>
                                                </h3>
                                            </div><!--end col-->
                                        </div>
                                    </div><!--end row-->
                                </div><!--end col-->
                            </a>

                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        @foreach($analysis as $singleAnalysis)
                      <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 my-2 border">
                        <div class="media-article pt-2 border-top pt-2 pb-2 ">
                            <div class="media">
                                <div class="media-header">
                                    <a href="{{ route('alltahlil.show', $singleAnalysis->id) }}"><img src="{{ asset($singleAnalysis->image) }}" class="img-fluid"></a>
                                </div>
                                <div class="media-body position-relative">
                                    <h1 class="media-article-titlee">
                                        <a href="{{ route('alltahlil.show', $singleAnalysis->id) }}" class="analyse-link">
                                            {{ $singleAnalysis->title }}
                                        </a>
                                        <p class="analyse-link text-dark">{{ Carbon\Carbon::parse($singleAnalysis->publishDate)->format('Y M d') }}</p>
                                    </h1>
                                    <div class="media-analysis-content">
                                        <a href="{{ route('authors.show', $singleAnalysis->user->id) }}" class="analyse-link-s">
                                            <svg class="svg-inline--fa fa-user fa-w-14 analyse-link-s" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg><!-- <i class="fa fa-user"></i> -->
                                            {{ $singleAnalysis->user->name }}
                                        </a>
                                        <br>
                                        <svg class="svg-inline--fa fa-comment fa-w-16 analyse-link-ss" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="comment" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32z"></path></svg><!-- <i class="fa fa-comment"></i> -->
                                        {{ $singleAnalysis->comments ? count($singleAnalysis->comments) : '0' }}
                                    </div>
                                    <!-- START .tickers-group -->

                                    <!-- END .tickers-group -->
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    </div>
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
@section('js')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@endsection
