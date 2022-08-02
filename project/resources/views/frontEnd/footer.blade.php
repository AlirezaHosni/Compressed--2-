<!-- footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-12 footer-content-sm">
                <div class="row">
                    <div class="col-4">
                        <ul class="footer-list">
                            <li class="menu-item-sm"><a href="{{ route('index') }}" class="text-warning">اصلی</a></li>
                            <li class="menu-item-sm"><a href="{{ route('home') }}">خانه</a></li>
                            <li class="menu-item-sm"><a href="{{ route('news') }}">اخبار</a></li>
                            <li class="menu-item-sm"><a href="{{ route('terms') }}">قوانین و مقررات</a></li>
                            <li class="menu-item-sm"><a href="{{ route('faq') }}">سوالات متداول</a></li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <ul class="footer-list">
                            <li class="menu-item-sm"><a href="{{ route('priceAnalysis') }}" class="text-warning">تحلیل قیمت</a></li>
                            <li class="menu-item-sm"><a href="{{ route('bitcoinsPriceAnalysis') }}">تحلیل قیمت بیت کوین</a></li>
                            <li class="menu-item-sm"><a href="{{ route('othersPriceAnalysis') }}">تحلیل قیمت ... کوین ها</a></li>
                            <li class="menu-item-sm"><a href="{{ route('bitcoinsPriceAnalysis') }}">تحلیل قیمت بیت کوین</a></li>
                            <li class="menu-item-sm"><a href="{{ route('fundamentalAnalysis') }}">تحلیل فاندامنتال</a></li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <ul class="footer-list">
                            <li class="menu-item-sm"><a href="{{ url('#') }}" class="text-warning">پرو اسکیلز</a></li>
                            <li class="menu-item-sm"><a href="{{ route('contactUs') }}">تماس با ما</a></li>
                            <li class="menu-item-sm"><a href="{{ route('aboutUs') }}">درباره ما</a></li>
                            <li class="menu-item-sm"><a href="{{ route('advertise.index') }}">تبلیغات</a></li>
                            <li class="menu-item-sm"><a href="{{ route('jobsOpportunities') }}">فرصت های شغلی</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <p class="text-center p-4 text-white">تمامی حقوق سایت توسط پرو اسکیلر محفوظ است</p>
                </div>
            </div>
            <div class="col-sm-3 col-12 footer-icons-box">
                <a href="{{ url('#') }}" class=" img-go-up"><img src="{{ asset('assets/imgs/icon/up icon.png') }}" class="img-fluid" alt=""></a>

                <div class="row flex-column justify-content-center align-items-center">
                    <a href="{{ url('#') }}" class="d-inline-block text-center"><img src="{{ asset('assets/imgs/icon/logo-footer.png') }}"  class="img-fluid footer-logo" alt=""></a></div>
                <div class="row social-media-box">
                    <a href="{{ route('facebook') }}" class="social-media"><img src="{{ asset('assets/imgs/icon/facebook_f_logo.png') }}" class="img-fluid facebook-img" alt=""></a>
                    <a href="{{ route('telegram') }}" class="social-media"><img src="{{ asset('assets/imgs/icon/Telegram-logo.png') }}" class="img-fluid" alt=""></a>
                    <a href="{{ route('linkedin') }}" class="social-media"><img src="{{ asset('assets/imgs/icon/linkedin-logo.png') }}" class="img-fluid" alt=""></a>
                    <a href="{{ route('instagram') }}" class="social-media"><img src="{{ asset('assets/imgs/icon/insta logo.png') }}" class="img-fluid" alt=""></a>
                    <a href="{{ route('twitter') }}" class="social-media"><img src="{{ asset('assets/imgs/icon/Twitter-logo.png') }}" class="img-fluid" alt=""></a>
                    <a href="{{ route('youtube') }}" class="social-media"><img src="{{ asset('assets/imgs/icon/youtube logo.png') }}" class="img-fluid" alt=""></a>
                </div>
            </div>
        </div>
    </div>

</footer>
