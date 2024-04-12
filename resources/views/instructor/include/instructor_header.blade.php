<header class="rbt-header rbt-header-10">
    <div class="rbt-sticky-placeholder"></div>
    <!-- Start Header Top  -->
    <div
        class="rbt-header-top rbt-header-top-1 header-space-betwween bg-not-transparent bg-color-darker top-expended-activation">
        <div class="container-fluid">
            <div class="top-expended-wrapper">
                <div class="top-expended-inner rbt-header-sec align-items-center ">
                    <div class="rbt-header-sec-col rbt-header-left d-none d-xl-block">
                        <div class="rbt-header-content">
                            @php
                                $iletisim = App\Models\SiteSetting::find(1);
                                $titles = App\Models\Title::find(1);
                            @endphp
                            <!-- Start Header Information List  -->
                            <div class="header-info">
                                <ul class="rbt-information-list">
                                    <li>
                                        <a href="tel:{{ $iletisim->telefon }}"><i class="feather-phone"></i>{{ $iletisim->telefon }}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Header Information List  -->
                        </div>
                    </div>
                    <div class="rbt-header-sec-col rbt-header-center">
                        <div class="rbt-header-content justify-content-start justify-content-xl-center">
                            <div class="header-info">
                                <div class="rbt-header-top-news">
                                    <div class="inner">
                                        <div class="content">
                                            <span class="rbt-badge variation-02 bg-color-primary color-white radius-round">{{ $titles->banner_text_first }}</span>
                                            <span class="news-text"><img src="{{ asset('frontend/assets/images/icons/hand-emojji.svg') }}"
                                            alt="Hand Emojji Images">{{ $titles->banner_text_second }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rbt-header-sec-col rbt-header-right mt_md--10 mt_sm--10">
                        <div class="rbt-header-content justify-content-start justify-content-lg-end">
                            <div class="header-info d-none d-xl-block">
                                <ul class="social-share-transparent">
                                    <li>
                                        <a href="{{ $iletisim->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ $iletisim->twitter }}"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ $iletisim->instagram }}"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="rbt-separator d-none d-xl-block"></div>
                        </div>
                    </div>
                </div>
                <div class="header-info">
                    <div class="top-bar-expended d-block d-lg-none">
                        <button class="topbar-expend-button rbt-round-btn"><i class="feather-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top  -->
    <div class="rbt-header-wrapper header-space-betwween header-sticky">
        <div class="container-fluid">
            <div class="mainbar-row rbt-navigation-center align-items-center">
                <div class="header-left rbt-header-content">
                    <div class="header-info">
                        <div class="logo">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('frontend/assets/images/logo/logo.png') }}"
                                    alt="Education Logo Images">
                            </a>
                        </div>
                    </div>
                    <div class="header-info">
                        <div class="rbt-category-menu-wrapper">
                            <div class="rbt-category-btn rbt-side-offcanvas-activation">
                                <div class="rbt-offcanvas-trigger md-size icon">
                                    <span class="d-none d-xl-block">
                                        <i class="feather-grid"></i>
                                    </span>
                                    <i title="Category" class="feather-grid d-block d-xl-none"></i>
                                </div>
                                <span class="category-text d-none d-xl-block">Kategoriler</span>
                            </div>

                            @php
                                $categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
                            @endphp

                            <div class="category-dropdown-menu d-none d-xl-block">
                                <div class="category-menu-item">
                                    <div class="rbt-vertical-nav">
                                        <ul class="rbt-vertical-nav-list-wrapper vertical-nav-menu">

                                            @foreach ($categories as $category)
                                                <li class="vertical-nav-item active">
                                                    <a href="#tab{{ $category->id }}">{{ $category->category_name }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <div class="rbt-vertical-nav-content">

                                        @foreach ($categories as $category)
                                            @php
                                                $subcategories = App\Models\SubCategory::where('category_id', $category->id)->get();
                                            @endphp

                                            <div class="rbt-vertical-inner tab-content" id="tab{{ $category->id }}">
                                                <div class="rbt-vertical-single">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-6 col-6">
                                                            <div class="vartical-nav-content-menu">
                                                                <h3 class="rbt-short-title">
                                                                    {{ $category->category_name }}</h3>
                                                                <ul class="rbt-vertical-nav-list-wrapper">

                                                                    @foreach ($subcategories as $subcat)
                                                                        <li><a
                                                                            href="{{ url('subcategory/'.$subcat->subcategory_slug.'/'.$subcat->id) }}">
                                                                            {{ $subcat->subcategory_name }}</a>
                                                                        </li>
                                                                    @endforeach

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rbt-main-navigation d-none d-xl-block">
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
                </div>

                <div class="header-right">

                    {{-- Giriş/Dashboard --}}
                    <ul class="quick-access">
                        <li class="access-icon">
                            <a class="search-trigger-active rbt-round-btn" href="#">
                                <i class="feather-search"></i>
                            </a>
                        </li>

                        <li class="access-icon rbt-mini-cart">
                            <a class="rbt-cart-sidenav-activation rbt-round-btn" href="#">
                                <i class="feather-shopping-cart"></i>
                                <span id="cartCount" class="rbt-cart-count"></span>
                            </a>
                        </li>

                        @if(Auth::check() && (Auth::user()->role == 'user' || Auth::user()->role == 'instructor'))

                        @php
                            $id = Auth::user()->id;
                            $profileData = App\Models\User::find($id);
                        @endphp

                        <li class="account-access rbt-user-wrapper d-none d-xl-block">
                            <a href="#"><i class="feather-user"></i>{{ $profileData->name }}</a>
                            <div class="rbt-user-menu-list-wrapper">
                                <div class="inner">
                                    <div class="rbt-admin-profile">
                                        <div class="admin-thumbnail">
                                            <img src="{{ !empty($profileData->photo) ? url('upload/user_images/' . $profileData->photo) : url('upload/profile.png') }}">
                                        </div>
                                        <div class="admin-info">
                                            <span class="name">{{ $profileData->name }}</span>
                                            <a class="rbt-btn-link color-primary" href="{{ route('user.profile') }}">Profilim</a>
                                        </div>
                                    </div>
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a href="{{ route('dashboard') }}">
                                                <i class="feather-home"></i>
                                                <span>Kontrol Paneli</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.profile') }}">
                                                <i class="feather-settings"></i>
                                                <span>Ayarlar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route ('user.logout') }}">
                                                <i class="feather-log-out"></i>
                                                <span>Çıkış</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        @else
                            <li class="access-icon rbt-user-wrapper d-none d-xl-block ml--20">
                                <a href="{{ route('login') }}"><i class="feather-user"></i> Giriş</a>
                            </li>
                        <div class="rbt-separator d-none d-xl-block ml--20 mr--20"></div>
                            <li class="access-icon rbt-user-wrapper d-none d-xl-block">
                                <a href="{{ route('register') }}"><i class="feather-user"></i> Kayıt</a>
                            </li>
                        @endif
                    </ul>
                    {{-- End Giriş/Dashboard --}}

                    <!-- Start Mobile-Menu-Bar -->
                    <div class="mobile-menu-bar d-block d-xl-none">
                        <div class="hamberger">
                            <button class="hamberger-button rbt-round-btn">
                                <i class="feather-menu"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Start Mobile-Menu-Bar -->

                </div>
            </div>
        </div>
        <!-- Start Search Dropdown  -->
        <div class="rbt-search-dropdown">
            <div class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="#">
                            <input type="text" placeholder="Özel Bir Kurs Mu Arıyorsun?">
                            <div class="submit-btn">
                                <a class="rbt-btn btn-gradient btn-md" href="#">Ara</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="rbt-separator-mid">
                    <hr class="rbt-separator m-0">
                </div>

                <div class="row g-4 pt--30 pb--60">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h5 class="rbt-title-style-2">Popüler Kurslar</h5>
                        </div>
                    </div>

                    @php
                        $searchBarCourses = App\Models\Course::latest()->limit(4)->get();
                    @endphp

                    @foreach ($searchBarCourses as $sbc)

                    <!-- Start Single Card  -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ url('course/details/' . $sbc->course_name_slug . '/' . $sbc->id) }}">
                                    <img src="{{ asset($sbc->course_image) }}" alt="{{ $sbc->course_name }}"
                                        alt="{{ $sbc->course_name }}">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title">
                                    <a href="{{ url('course/details/' . $sbc->course_name_slug . '/' . $sbc->id) }}">
                                    {{ $sbc->course_name }}
                                    </a>
                                </h5>
                                <div class="rbt-review">
                                    @php
                                        $reviewCount = App\Models\Review::where('course_id', $sbc->id)
                                            ->where('status', 1)
                                            ->latest()
                                            ->get();
                                        $avarageReviews = App\Models\Review::where('course_id', $sbc->id)
                                            ->where('status', 1)
                                            ->avg('rating');
                                    @endphp
                                    <div class="rating">
                                        @if ($avarageReviews == 0)
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        @elseif ($avarageReviews == 1 || $avarageReviews < 2)
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        @elseif ($avarageReviews == 2 || $avarageReviews < 3)
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        @elseif ($avarageReviews == 3 || $avarageReviews < 4)
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        @elseif ($avarageReviews == 4 || $avarageReviews < 5)
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        @elseif ($avarageReviews == 5 || $avarageReviews < 5)
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                        @endif
                                    </div>
                                    <span class="rating-count"> ( {{ count($reviewCount) }} )
                                        Değerlendirme</span>
                                </div>
                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        @if ($sbc->discount_price == NULL)
                                        <span class="current-price">{{ $sbc->selling_price }}</span>
                                        @else
                                        <span class="current-price">{{ $sbc->selling_price }}</span>
                                        <span class="off-price">{{ $sbc->discount_price }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    @endforeach

                </div>
            </div>
        </div>
        <!-- End Search Dropdown  -->
    </div>
    <!-- Start Side Vav -->
    <div class="rbt-offcanvas-side-menu rbt-category-sidemenu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="inner-title">
                    <h4 class="title">Kategoriler</h4>
                </div>
                <div class="rbt-btn-close">
                    <button class="rbt-close-offcanvas rbt-round-btn"><i class="feather-x"></i></button>
                </div>
            </div>
            <nav class="side-nav w-100">
                <ul class="rbt-vertical-nav-list-wrapper vertical-nav-menu">

                    @php
                        $categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
                    @endphp

                    @foreach ($categories as $category)
                        <li class="vertical-nav-item">
                            <a href="#tab{{ $category->id }}">{{ $category->category_name }}</a>

                            <div class="vartical-nav-content-menu-wrapper" id="tab{{ $category->id }}">
                                <div class="vartical-nav-content-menu">
                                    <ul class="rbt-vertical-nav-list-wrapper">
                                        @php
                                            $subcategories = App\Models\Subcategory::where('category_id', $category->id)->get();
                                        @endphp
                                        @foreach ($subcategories as $subcat)
                                            <li>
                                                <a href="{{ url('subcategory/'.$subcat->subcategory_slug.'/'.$subcat->id) }}">
                                                    {{ $subcat->subcategory_name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>

                <div class="read-more-btn">
                    <div class="rbt-btn-wrapper mt--20">
                        <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center"
                            href="{{ route('instructor.courses') }}">
                            <span>Tüm Kurslar</span>
                        </a>
                    </div>
                </div>
            </nav>
            <div class="rbt-offcanvas-footer">

            </div>
        </div>
    </div>
    <!-- End Side Vav -->
    <a class="rbt-close_side_menu" href="javascript:void(0);"></a>
</header>
