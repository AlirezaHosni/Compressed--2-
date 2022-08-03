@extends('frontEnd.layouts.master')
@section('title')
    Pro Skills
@endsection
@section('head-tag')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-reboot.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/basic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index-style.css') }}">


@endsection
@section('content')
    <!-- main  -->
    <main>
        <!-- container -->
        <div class="container-fluid">

        @include('frontEnd.header-menu')

            <!-- ads -->
            <div class="ad">
                <div class="row justify-content-center align-center">
                    <h2 class="ads-title-sm">تبلیغات</h2>
                </div>
            </div>

            <!-- Analyse -->
            <div class="analyse mt-2">
                <!-- row -->
                <div class="row analyse-content">
                    <!-- analyse active -->
                    <figure class="analyse-active col-12 col-sm-5 bg-white rounded p-1 d-flex justify-content-between mb-0 flex-column">
                        <img src="{{ asset($firstArticle->image) }}" class="img-fluid" alt="">
                        <a class="text-dark" href="{{ route('singleArticle', $firstArticle->url) }}"> <h2 class="title-2">{{ $firstArticle->title }} - {{ Carbon\Carbon::parse($firstArticle->publishDate)->format('Y M d') }}</h2></a>
                        <figcaption class="analyse-active-text">
                            {{ $firstArticle->summary }}
                        </figcaption>
                    </figure>
                    <!-- analyse items -->
                    <div class="analys-items col-12 col-sm-7 rounded d-flex flex-column flex-wrap justify-content-between align-item-center p-0" >
                        <!-- 1 -->
                        <div class="row m-0 analys-item justify-content-between">
                            <!-- right -->
                            @foreach($articles as $article)
                                <div class="col-12 col-sm-6 grid-margin">
                                    <div class="analyse-item-content bg-white border">
                                        <a class="text-dark" href="{{ route('singleArticle', $article->url) }}"><h2 class="font-weight-bold analyse-item-title">{{ $article->title }}</h2></a>
                                        <span class="font-weight-bold analyse-item-date ">{{ Carbon\Carbon::parse($article->publishDate)->format('Y M d') }}</span>
                                        <p class="analyse-item-text text-truncate">
                                            {{ $article->summary }}
                                        </p>
                                        <div class="d-flex justify-content-between align-item-center">
                                            <span class="analyse-item-time">{{ jalaliAgo($article->publishDate) }}</span>
                                            <a href="{{ url('#') }}" class="analyse-item-more"><img src="{{ asset('assets/imgs/icon/icon.png') }}" class="img-fluid " alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- 3 -->
                        <div class="row m-0  px-2 analys-item f">
                            <div class="bg-warning webinar d-flex">
                                <span class="text-weight-bold">وبینار های رایگان هفتگی</span>
                                <span class="text-uppercase text-weight-bold">Webinar</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- economic news -->
            <div class="economic-news p-3">

                <div class="row">
                    <!-- 1 -->
                    <div class="col-sm-3 col-12 economic-items economic-order-none">
                        <h4 class="economic-items-title">اخبار اقتصادی</h4>
                        <!-- <h2>اخبار اقتصادی</h2> -->
                        <div class="row economic-items-content flex-column p-3">
                            @foreach($financeArticles as $financeArticle)
                                <a class="text-dark" href="{{ route('singleArticle', $financeArticle->url) }}">
                                    <div class="economic-item border-bottom">
                                        <p class="economic-item-text text-justify line-height-2">
                                            {{ $financeArticle->summary }}
                                        </p>
                                        <span class="economic-item-time d-block">{{ jalaliAgo($financeArticle->publishDate) }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                    </div>
                    <!-- 2 -->
                    <div class="col-sm-6 col-12 economic-items economic-order">
                        <div class="row economic-items-content p-3 economic-items-content-sm">
                            <div class="col-sm-6 col-12">
                                <!--<figure class="analyse-active econimic-active col-12 col-sm-5 bg-white rounded p-1 d-flex w-100 justify-content-between mb-0 flex-column">-->
                                <figure class="analyse-active econimic-active col-12 bg-white rounded p-1 d-flex w-100 justify-content-between mb-0 flex-column">
                                    <img src="{{ asset($financeArticles->first()->image) }}" class="img-fluid" alt="">
                                    <a class="text-dark" href="{{ route('singleArticle', $financeArticles->first()->url) }}"><h2 class="title-2 econimic-active-title">{{ $financeArticles->first()->title }} - {{ Carbon\Carbon::parse($financeArticles->first()->publishDate)->format('Y M d') }}</h2></a>
                                    <figcaption class="fs-8rem economic-p">
                                        {{ $financeArticles->first()->summary }}
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="row economic-items-content flex-column p-3">
                                    @foreach($financeArticles as $financeArticle)
                                        <a class="text-dark" href="{{ route('singleArticle', $financeArticle->url) }}">
                                            @if($financeArticle->id != $financeArticles->first()->id)
                                                <div class="economic-item border-bottom">
                                                    <p class="economic-item-text text-justify line-height-2">
                                                        {{ $financeArticle->summary }}
                                                    </p>
                                                    <span class="economic-item-time d-block">{{ jalaliAgo($financeArticle->publishDate) }}</span>
                                                </div>
                                            @endif
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 3 -->
                    <div class="col-sm-3 col-12 economic-items economic-order-none">
                        <h4 class="economic-items-title">اخبار اقتصادی</h4>
                        <div class="row economic-items-content flex-column p-3">
                            @foreach($financeArticles as $financeArticle)
                                <a class="text-dark" href="{{ route('singleArticle', $financeArticle->url) }}">
                                    <div class="economic-item border-bottom">
                                        <p class="economic-item-text text-justify line-height-2">
                                            {{ $financeArticle->summary }}
                                        </p>
                                        <span class="economic-item-time d-block">{{ jalaliAgo($financeArticle->publishDate) }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- famous brogers -->
            <div class="famous-broger p-3">


                <h4>معرفی بروگر ها</h4>
                <div class="row justify-content-around bg-white align-center p-2 famous-content">
                    <div class="col-sm-2 col-12 text-center famous-items-box">
                        <img src="{{ asset('assets/imgs/pic/Layer 7 copy 2.png') }}" class="img-fluid img-famous d-inline-block" alt="">
                        <a href="{{ route('nordFx') }}" class="btn-famous d-inline-block">ثبت نام کنید</a>
                    </div>
                    <div class="col-sm-2 col-12 text-center famous-items-box">
                        <img src="{{ asset('assets/imgs/pic/Layer 6 copy.png') }}" class="img-fluid img-famous d-inline-block" alt="">
                        <a href="{{ route('ironFx') }}" class="btn-famous d-inline-block">ثبت نام کنید</a>
                    </div>
                    <div class="col-sm-2 col-12 text-center famous-items-box">
                        <img src="{{ asset('assets/imgs/pic/Layer 7 copy 2.png') }}" class="img-fluid img-famous d-inline-block" alt="">
                        <a href="{{ route('nordFx') }}" class="btn-famous d-inline-block">ثبت نام کنید</a>
                    </div>
                    <div class="col-sm-2 col-12 text-center famous-items-box">
                        <img src="{{ asset('assets/imgs/pic/Layer 5 copy.png') }}" class="img-fluid img-famous d-inline-block" alt="">
                        <a href="{{ route('dfc') }}" class="btn-famous d-inline-block">ثبت نام کنید</a>
                    </div>
                    <div class="col-sm-2 col-12 text-center famous-items-box">
                        <img src="{{ asset('assets/imgs/pic/Layer 4 copy.png') }}" class="img-fluid img-famous d-inline-block" alt="">
                        <a href="{{ route('bkFx') }}" class="btn-famous d-inline-block">ثبت نام کنید</a>
                    </div>
                </div>


            </div>

            <!-- news -->
            <div class="news">
                <div class="row">
                    <!-- contetn -->
                    <div class="col-sm-9 col-12 news-content">
                        <!-- news -->
                        <h2 class="news-title-sm">جدیدترین ها</h2>
                        <div class="row news-content-box">
                            <h2 class="news-title">جدیدترین ها</h2>
                            <!-- news items -->
                            <div class="col-12 news-items row p-5 bg-white">
                                <!-- 1 -->
                                @foreach($latestArticles as $latestArticle)
                                    <div class="col-12 d-flex justify-content-between news-item news-item-first-sm border-bottom p-3">

                                        <div class="col-12 col-sm-3 news-item-img"><img src="{{ asset($latestArticle->image) }}" alt=""></div>
                                        <div class="col-sm-9 col-12 news-item-content d-flex flex-column justify-content-between">
                                            <a class="text-dark" href="{{ route('singleArticle', $latestArticle->url) }}" >
                                                <h6 class="news-item-title">
                                                    {{ $latestArticle->title }}
                                                </h6>
                                            </a>
                                            <p class="news-item-text">
                                                {{ $latestArticle->summary }}
                                            </p>
                                            <span class="news-item-time">{{ jalaliAgo($latestArticle->publishDate) }}</span>
                                        </div>
                                    </div>
                            @endforeach
                            <!-- more news -->
                                <div class="btn-more-news">
                                    <a href="{{ url('#') }}">مشاهده بیشتر</a>
                                </div>
                            </div>
                        </div>
                        <!-- goals -->
                        <div class="row news-content-box goals mt-5">
                            <!-- goals title -->
                            <h2 class="news-title news-title-sm">چشم اندازها</h2>
                            <div class="col-sm-6 col-12 forex-box">
                                <div class="bg-white forex-news-box-sm border br-5rem">
                                    <p class="news-forex-pa-sm">{{ jalaliAgo($firstForexArticle->publishDate) }}</p>
                                    <h2 class="news-forex-title">اخبار امروز فارکس</h2>
                                    <a href="{{ route('singleArticle', $firstForexArticle->url) }}">
                                        <div class="forex-img-box-sm">
                                            <img src="{{ asset($firstForexArticle->image) }}" alt="">
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="col-sm-6 col-12 content-items-box">
                                <div class="content-items-box-sm">
                                    @foreach($forexArticles as $forexArticle)
                                        <div class="d-flex col-12 border br-5rem goals-items bg-white p-1">
                                            <div class="w-50">
                                                <img src="{{ asset($forexArticle->image) }}" alt="">
                                            </div>
                                            <!--  -->
                                            <div class="w-50 d-flex flex-column justify-content-between gloas-item-content">
                                                <a class="text-dark" href="{{ route('singleArticle', $forexArticle->url) }}" ><h3 class="goals-item-title">{{ $forexArticle->title }}</h3></a>
                                                <a href="{{ url('#') }}" class="analyse-item-more d-block text-left more-img-goals"><img src="{{ asset('assets/imgs/icon/icon.png') }}" class="img-fluid " alt=""></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- product analyse -->
                        <!-- news -->
                        <div class="row news-content-box mt-5">
                            <h2 class="news-title">جدیدترین ها</h2>
                            <!-- news items -->
                            <div class="col-12 news-items news-items-main p-5 bg-white">
                                <div class="row clearfix news-items-content-box flex-wrap" id="news-items-content-box">
                                    @foreach($latestArticles as $latestArticle)
                                        <div class="card card-sm col-sm-4 force-count col-12 b-none" data-id="{{ $latestArticle->id }}">
                                            <img class="card-img-top" src="{{ asset($latestArticle->image) }}" alt="Card image cap">
                                            <div class="card-body">
                                                <a class="text-dark" href="{{ route('singleArticle', $latestArticle->url) }}" ><h5 class="card-title fs-1rem card-title-sm font-weight-bold">{{ $latestArticle->title }}</h5></a>
                                                <p class="card-text analys-card-text">
                                                    {{ $latestArticle->summary }}
                                                </p>
                                                <span class="analyse-card-time">{{ jalaliAgo($latestArticle->publishDate) }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- ads -->
                    <div class="col-sm-3 ads-sm col-12 news-ads d-flex flex-column justify-content-center align-items-center">

                        <div class="news-ads-item-up w-75 d-flex br-5rem justify-content-center align-items-center bg-info">
                            {{--                                <h2 class="d-inline-block">تبلیغات</h2>--}}
                            <a href="{{ url($advertise->url) }}" ><img src="{{ asset($advertise->image) }}"/></a>
                        </div>
                        <div class="news-ads-item-down w-75 d-flex br-5rem justify-content-center align-items-center bg-success">
                            {{--                                <h2 class="d-inline-block">تبلیغات</h2>--}}
                            <a href="{{ url($advertise->url) }}" ><img src="{{ asset($advertise->image) }}"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script>
        $(".text-search-box").css('display' , 'none');
        $("#search-icon").click(function(){
            $(".text-search-box").toggle(1000);

        });
        $("#menubar-icon").click(function(){
            //alert("hello");
            $(".navbar").toggle(1000);
        });
        // var itemElm = document.querySelector('#news-items-content-box');
        // var latestId = itemElm.children[itemElm.children.length - 1].getAttribute("data-id");
        var newItem = null
        function createPost(){
            var itemElm = document.querySelector('#news-items-content-box');
            var latestId = itemElm.children[itemElm.children.length - 1].getAttribute("data-id");
            console.log(itemElm.children.length);

            $.ajax({
                url : "/latest-article/" + latestId,
                type : "GET",
                async: false,
                success : function(response){
                    newItem = response
                    // console.log(newItem)
                }
            });
            console.log(newItem)

            $lefd = $(".force-count").length
            if($lefd <= 15){
                var item = document.createElement('div');
                item.className += 'card ';
                item.className += 'col-sm-4 ';
                item.className += 'b-none ';
                item.className += "force-count ";
                item.className += 'card-sm ';
                item.className += 'col-12 ';
                item.setAttribute('data-id' , newItem["id"]);


                //item.style.width = '100%';
                var img = document.createElement('img');
                img.className = 'card-img-top ';
                img.setAttribute('src' , 'http://proskills.shop/' + newItem['image']);

                var div = document.createElement('div');

                div.className += 'card-body ';

                var h2 = document.createElement('h5');
                h2.className += 'card-title ';
                h2.className += 'fs-1rem ';
                h2.className += 'font-weight-bold ';
                h2.className += 'card-title-sm';

                var a = document.createElement('a');
                a.className += 'text-dark';
                a.setAttribute('href' , '/' + newItem["url"]);

                var p = document.createElement('p');
                p.className += 'card-text ';
                p.className += 'analys-card-text ';

                var span = document.createElement('span');
                span.className += 'analyse-card-time ';

                h2.innerHTML = newItem['title'];
                p.innerHTML = newItem['summary']
                span.innerHTML = newItem['publishDateAgo'];

                a.appendChild(h2);
                div.appendChild(a);
                div.appendChild(p);
                div.appendChild(span);


                item.appendChild(img);
                item.appendChild(div);

                itemElm.append(item);

            }
        }

        // The Scroll Event.
        window.addEventListener('scroll',function(){
            var scrollHeight = document.documentElement.scrollHeight;
            var scrollTop = document.documentElement.scrollTop;
            var clientHeight = document.documentElement.clientHeight;

            if( (scrollTop + clientHeight) >= (scrollHeight) - 5){
                //createPost()

                setTimeout(createPost,1000);


            }


        });

    </script>
@endsection

