@php
    $mainTitle = App\Models\Title::find(1);
@endphp
<div class="rbt-banner-area rbt-banner-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pb--120 pt--70">
                <div class="content">
                    <div class="inner">
                        <div class="rbt-new-badge rbt-new-badge-one">
                            <span class="rbt-new-badge-icon">🏆</span> {{ $mainTitle->badge_title }}
                        </div>

                        <h1 class="title">
                            {{ $mainTitle->h1_title }}
                        </h1>
                        <p class="description">{{ $mainTitle->h1_desc }}</p>
                        <div class="slider-btn">
                            <a class="rbt-btn btn-gradient hover-icon-reverse" href="{{ route('instructor.courses') }}">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Tüm Kurslar</span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="shape-wrapper" id="scene">
                        <img src="{{ asset($mainTitle->main_image) }}" alt="anasayfa görsel">
                        <div class="hero-bg-shape-1 layer" data-depth="0.4">
                            <img src="{{ asset('frontend/assets/images/shape/shape-01.png') }}" alt="anasayfa arkaplan görsel">
                        </div>
                        <div class="hero-bg-shape-2 layer" data-depth="0.4">
                            <img src="{{ asset('frontend/assets/images/shape/shape-02.png') }}" alt="anasayfa arkaplan görsel">
                        </div>
                    </div>

                    <div class="banner-card pb--60 mb--50 swiper rbt-dot-bottom-center banner-swiper-active">
                        <div class="swiper-wrapper">

                            @php
                                $randomCourses = App\Models\Course::inRandomOrder()->limit(4)->get();
                            @endphp

                            @foreach ($randomCourses as $random)

                            <!-- Start Single Card  -->
                            <div class="swiper-slide">
                                <div class="rbt-card variation-01 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="{{ url('course/details/'.$random->course_name_slug.'/'.$random->id) }}">
                                            <img src="{{ asset($random->course_image) }}"
                                            alt="{{ $random->course_name }}">
                                            <div class="rbt-badge-3 bg-white">
                                                @php
                                                $discount = null;
                                                    if (!is_null($random->discount_price)) {
                                                    $amount = $random->selling_price - $random->discount_price;
                                                    $discount = ($amount / $random->selling_price) * 100;
                                                    }
                                                @endphp
                                                <span>{{ is_null($discount) ? 'Yeni' : round($discount) . '%' }}</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="rbt-card-body">
                                        <ul class="rbt-meta">
                                            <li><i class="feather-clock"></i>{{ $random->duration }} Saat Kurs İçeriği</li>
                                        </ul>
                                        <h4 class="rbt-card-title"><a href="{{ url('course/details/'.$random->course_name_slug.'/'.$random->id) }}">{{ $random->course_name }}</a>
                                        </h4>
                                        <p class="rbt-card-text">{{ Illuminate\Support\Str::words($random->course_meta_description, 10) }}</p>
                                        <div class="rbt-review">
                                            @php
                                                $reviewCount = App\Models\Review::where('course_id', $random->id)
                                                    ->where('status', 1)
                                                    ->latest()
                                                    ->get();
                                                $avarageReviews = App\Models\Review::where('course_id', $random->id)
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
                                            <span class="rating-count"> ( {{ count($reviewCount) }} ) Değerlendirme</span>
                                        </div>
                                        <div class="rbt-card-bottom">
                                            <div class="rbt-price">
                                                @if ($random->discount_price == NULL)
                                                <span class="current-price">₺ {{ $random->selling_price }}</span>
                                                @else
                                                <span class="current-price">₺ {{ $random->discount_price }}</span>
                                                <span class="off-price">₺ {{ $random->selling_price }}</span>
                                                @endif
                                            </div>
                                            <a class="rbt-btn-link" href="{{ url('course/details/'.$random->course_name_slug.'/'.$random->id) }}">Görüntüle<i
                                                    class="feather-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Card  -->

                            @endforeach

                        </div>
                        <div class="rbt-swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
