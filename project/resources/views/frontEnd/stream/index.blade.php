@extends('frontEnd.layouts.master')
@section('title')
    Stream
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
                    <div class="row">
                        <ul class="list-inline ul-stream">
                            @foreach($articleGroups as $articleGroup)
                            <li class="list-inline-item ">
                                <a href="{{ route('stream.index', $articleGroup->id) }}">{{ $articleGroup->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            <!-- START .tab-pane #1-->
                            <div id="steamList">
                                @foreach($articles as $article)
                                    <div class="article-headline border-0">
                                        <div class="story-group d-inline-block mb-3">
                                        <span class="px-2 py-1">
                                            <a class="font-12" href="{{ $article->article_group->url }}">
                                                {{ $article->article_group->title }}
                                            </a>
                                        </span>
                                        </div>
                                        <h2 class="mb-2 font-16">
                                            {{ $article->title }}
                                        </h2>
                                        <div class="stream-text font-14">
                                            <p><span style="font-size:14px; text-align:justify">{{ $article->mainContent }}</span></p>
                                        </div>
                                        <strong>
                                            منبع:
                                            {{ $article->source }}
                                        </strong>
                                        <div class="text-secondary ">
                                            {{ jalaliAgo($article->publishDate) }}
                                            توسط {{ $article->user->name }}
                                        </div>
                                    </div>
                                    <hr class="mt-0">
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
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@endsection
