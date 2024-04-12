@php
    $iletisim = App\Models\SiteSetting::find(1);
@endphp
<div class="popup-mobile-menu">
    <div class="inner-wrapper">
        <div class="inner-top">
            <div class="content">
                <div class="logo">
                    <a href="{{ url('index') }}">
                        <img src="{{ asset('frontend/assets/images/logo/logo.png') }}" alt="logo">
                    </a>
                </div>
                <div class="rbt-btn-close">
                    <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                </div>
            </div>
            <ul class="navbar-top-left rbt-information-list justify-content-start mt--30">
                <li>
                    <a href="mailto:hello@example.com"><i class="feather-mail"></i>{{ $iletisim->email }}</a>
                </li>
                <li>
                    <a href="#"><i class="feather-phone"></i>{{ $iletisim->telefon }}</a>
                </li>
            </ul>
        </div>

        <nav class="mainmenu-nav">
            <ul class="mainmenu">
                <li>
                    <a href="{{ route('instructor.courses') }}">Kurslar</a>
                </li>
                <li>
                    <a href="{{ route('hakkimizda') }}">Hakkımızda</a>
                </li>
                <li>
                    <a href="{{ route('blog') }}">Blog</a>
                </li>
                <li>
                    <a href="{{ route('sss') }}">S.S.S.</a>
                </li>
                <li>
                    <a href="{{ route('iletisim') }}">İletişim</a>
                </li>
            </ul>
        </nav>

        <hr class="rbt-separator mt--20 mb--20">

        <div class="mobile-menu-bottom">
            @if(Auth::check() && (Auth::user()->role == 'user' || Auth::user()->role == 'instructor'))

            @php
                $id = Auth::user()->id;
                $profileData = App\Models\User::find($id);
            @endphp
            <div class="rbt-btn-wrapper mb--20">
                <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center"
                href="{{ url('dashboard') }}">
                    <span> Kontrol Paneli</span>
                </a>
            </div>
            @else

            <div class="rbt-btn-wrapper mb--20">
                <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center"
                href="{{ url('login') }}">
                    <span> Giriş Yap</span>
                </a>
            </div>
            <hr class="rbt-separator mt--20 mb--20">
            <div class="rbt-btn-wrapper mb--20">
                <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center"
                href="{{ url('register') }}">
                    <span> Kayıt Ol</span>
                </a>
            </div>
            @endif

            <div class="social-share-wrapper">
                <span class="rbt-short-title d-block">Sosyal Medya</span>
                <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
                    <li><a href="https://www.facebook.com/">
                            <i class="feather-facebook"></i>
                        </a>
                    </li>
                    <li><a href="https://www.twitter.com">
                            <i class="feather-twitter"></i>
                        </a>
                    </li>
                    <li><a href="https://www.instagram.com/">
                            <i class="feather-instagram"></i>
                        </a>
                    </li>
                    <li><a href="https://www.linkdin.com/">
                            <i class="feather-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
