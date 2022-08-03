@extends('frontEnd.layouts.master')
@section('title')
    Single Skills
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
                                    <span class="text-muted font-weight-normal">نویسنده : {{ $article->user->name }}</span>
                                </p>
                                <p>
                                    <span class="text-muted font-weight-normal"> {{ jalaliDate($article->publishDate, '%A, %d %B') }}</span>
                                    <span class="text-muted font-weight-normal">تعداد کلمات :  504</span>
                                    <span class="text-muted font-weight-normal"> مدت زمان مطالعه : 3 دقیقه</span>
                                    <span class="text-muted font-weight-normal"> تعداد بازدید : 37</span>
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
                            <span class="d-inline-block position-absolute border">سرفصل</span>
                        </div>
                        <div class="col-12 pt-5 pb-3 px-5 titr-links-box">
                            <a href="#" class="d-block btn-titr-head position-relative">بررسی بازارهای اوراق قرضه</a>
                            <a href="#" class="d-block btn-titr-head position-relative">نظر سنجی ها چه می گویند</a>
                        </div>
                        <div class="col-12 py-3 px-5 d-flex justify-content-center align-items-center">
                            <a href="#" class="social-media"><img src="{{ asset('assets/imgs/icon/Facebook_f_logo_(2019).svg.png') }}" alt=""></a>
                            <a href="#" class="social-media "><img src="{{ asset('assets/imgs/icon/Telegram_2019_Logo.svg.png') }}" alt=""></a>
                            <a href="#" class="social-media twitter"><img src="{{ asset('assets/imgs/icon/697029-twitter-512.png') }}" alt=""></a>
                            <a href="#" class="social-media"><img src="{{ asset('assets/imgs/icon/LinkedIn_icon_circle.svg.png') }}" alt=""></a>

                        </div>
                        <div class="col-12 py-3 px-5">
                            <p class="text-blog">
                                باب میشل، یکی از افراد با تجربه در بازار اوراق قرضه که
                                سابقه‌ای بیش از چهار دهه فعالیت در این عرصه را دارد، احتمال
                                رکود اقتصادی ایالات متحده در 18 ماه آینده را 75 درصد پیش‌بینی
                                می‌کند.
                            </p>
                            <p class="text-blog">
                                میشل، مدیر ارشد سرمایه گذاری
                                <b>JPMorgan Asset Management</b>

                                ،
                                روز
                                جمعه در هفته‌نامه وال استریت در شبکه خصوصی تلویزیون بلومبرگ
                                گفت: «مشتریان در حال بازگشت به بازار اوراق قرضه، به ویژه اوراق
                                قرضه شرکتی هستند». به این دلیل که آن‌ها اعتماد خود را به بانک
                                های مرکزی تجدید کرده‌اند.
                            </p>
                            <h2>بررسی بازارهای اوراق قرضه</h2>
                            <p class="text-blog">
                                بانک‌های مرکزی در سرتاسر جهان در تلاش برای مهار تورم، نرخ‌های
                                بهره را به شدت افزایش می‌دهند، در حالی که تلاش می‌کنند از وارد
                                کردن اقتصادها به رکود جلوگیری کنند. بانک مرکزی اروپا این هفته
                                برای اولین بار در بیش از یک دهه گذشته نرخ بهره را افزایش داد.
                                نظرسنجی بلومبرگ از 44 اقتصاددان که بین 15 تا 20 جولای انجام
                                شد، نشان داد که انتظارات این است که بانک مرکزی امریکا (فدرال
                                رزرو) هفته آینده دوباره 75 واحد افزایش یابد و سپس در سپتامبر
                                به 50 واحد کاهش یابد.
                            </p>
                            <p class="text-blog">با انتظارات رکود اقتصادی 75 درصد، میشل گفت:</p>
                            <p class="text-blog">
                                بازار اکنون قیمت‌گذاری عادلانه‌ای دارد. لذا، بر این باور است
                                که فدرال رزرو باید در مسری حرکت کند که بازار نیز با آن هماهنگ
                                باشد. ما در مورد نرخ وجوه فدرال رزرو در حدود 3.5 درصد در پایان
                                سال صحبت می کنیم.
                            </p>
                            <p class="text-blog">
                                ارین براون، مدیر پورتفولیوی استراتژی چند دارایی در شرکت مدیریت
                                سرمایه‌گذاری اقیانوس آرام، به تلویزیون بلومبرگ گفت:
                            </p>
                            <blockquote class="text-blog q-text-blog">
                                بازار سهام که بهترین هفته خود را در یک ماه به ثبت رساند، در
                                رکود سال آینده به طور کامل قیمت گذاری نشده است. او گفت: بازار
                                اساساً رشدی راکد دارد. من فکر می کنم رشد منفی خواهد بود.
                            </blockquote>
                            <p class="text-blog">براون گفت:</p>
                            <blockquote class="text-blog q-text-blog">
                                «ببینید، با شروع فصل درآمد، سطح بازار همچنان پایین بود.
                                «واقعاً آنچه در حال حاضر از شرکت‌های بزرگ می‌شنوید این است که
                                مصرف‌کننده در حال ضعیف شدن است، اما همچنین شروع به مشاهده ضعیف
                                شدن اعتماد تجاری می‌کنید.»
                            </blockquote>
                            <p class="text-blog">نظرسنجی‌ها چه می‌گویند؟</p>
                            <p class="text-blog ">
                                بر اساس نظرسنجی
                                <b>
                                    S&P Global
                                </b>

                                ،
                                با تأکید بر ترس از کاهش رشد، اوراق
                                خزانه افزایش را افزایش دادند و بازدهی 10 ساله را به حدود 2.7
                                درصد رساندند، در حالی که فعالیت تجاری در سراسر جهان در ماه
                                جولای بدتر شد.
                            </p>
                            <blockquote class="text-blog q-text-blog">
                                براون گفت: تورم پایدار همچنان در درآمدهای سه ماهه دوم ظاهر
                                خواهد شد، اما آنچه جدید است این است که شما شروع به دیدن هزینه
                                های تامین مالی بالاتر نیز کرده اید.
                            </blockquote>
                            <p class="text-blog">
                                هر دو در مورد چشم‌انداز کوتاه‌مدت اروپا توافق کردند و گفتند که
                                تورم احتمالاً بالا خواهد ماند و اتحادیه اروپا به دلیل جنگ
                                روسیه با اوکراین به مبارزه با افزایش هزینه‌های انرژی ادامه
                                خواهد داد.
                            </p>
                            <blockquote class="text-blog q-text-blog">
                                میشل گفت: بانک مرکزی اروپا هر چه در توان دارد انجام خواهد داد
                                تا مصرف را کاهش دهد، اگرچه "ECB فقط می تواند نرخ ها را تا این
                                حد بالا، شاید 1.5، 1.75٪ افزایش دهد."
                            </blockquote>
                        </div>
                        <div class="col-12 py-3 px-5">
                <span class="d-block"
                >
                <strong class="resource">

                    منبع:

                    {{ $article->source }}
                </strong>



                </span>
                            <span class="d-block">
                    برچسب ها
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
                            <h5 class="conversation-title mb-4 latobold"><span>نظرات کاربران {{ count($comments) }} </span></h5>
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

                            <form action="{{ route('comment.storeComment', $article->id) }}" method="post" novalidate="novalidate"><input data-val="true" data-val-required="فیلد آدرس مقاله را وارد نمایید." id="Uri" name="Uri" type="hidden" value="5058">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 my-3">
                                        <input class="form-control text-box single-line" data-val="true" data-val-maxlength="The field نام  must be a string or array type with a maximum length of '100'." data-val-maxlength-max="100" data-val-required="فیلد نام  را وارد نمایید." id="Name" name="fullName" placeholder="نام" type="text" value="">
                                        <span class="field-validation-valid help-block with-errors" data-valmsg-for="Name" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="form-group col-md-6 my-3">
                                        <input class="form-control text-box single-line" data-val="true" data-val-maxlength="The field ایمیل must be a string or array type with a maximum length of '150'." data-val-maxlength-max="150" data-val-required="فیلد ایمیل را وارد نمایید." id="Email" name="email" placeholder="ایمیل" type="text" value="">
                                        <span class="field-validation-valid help-block with-errors" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                                    </div>

                                    <div class="form-group col-md-12 mb-0">
                                        <textarea class="form-control h-100 text-box multi-line" data-val="true" data-val-maxlength=" متن   بیشتر از 2000 کاراکتر نمی‌تواند باشد." data-val-maxlength-max="2000" data-val-required="فیلد متن  را وارد نمایید." id="Text" name="Text" placeholder="نظر شما" rows="4" style="height: 62px;"></textarea>
                                        <span class="field-validation-valid help-block with-errors" data-valmsg-for="Text" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="text-right my-3">
                                            <button class="btn send-msg btn-primary">ثبت نظر</button>
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
