@extends('frontend.master')
@section('home')
    <div class="rbt-page-banner-wrapper">
        <div class="rbt-banner-image"></div>
    </div>
    <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rbt-dashboard-content-wrapper">
                        <div class="tutor-bg-photo bg_image bg_image--22 height-350">
                            <img src="{{ !empty($instructor->profile_banner) ? url('upload/instructor_images/' . $instructor->profile_banner) : url('upload/banner.jpg') }}"
                                alt="">
                        </div>
                        <div class="rbt-tutor-information">
                            <div class="rbt-tutor-information-left">
                                <div class="thumbnail rbt-avatars size-lg">
                                    <img src="{{ !empty($instructor->photo) ? url('upload/instructor_images/' . $instructor->photo) : url('upload/profile.png') }}"
                                        alt="{{ $instructor->name }}">
                                </div>
                                <div class="tutor-content">
                                    <h5 class="title">{{ $instructor->name }}</h5>
                                    <ul class="rbt-meta rbt-meta-white mt--5">
                                        <li><i class="feather-book"></i>20 Courses</li>
                                        <li><i class="feather-users"></i>40 Students</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt--30">
                    <div class="profile-content rbt-shadow-box">
                        <h4 class="rbt-title-style-3">Eğitmen Hakkında</h4>
                        <div class="row g-5">
                            <div class="col-lg-8">
                                <p class="mt--10 mb--20">
                                    {{ $instructor->instructor_bio }}
                                </p>
                                <ul class="social-icon social-default justify-content-start">
                                    @if(!empty($instructor->facebook))
                                    <li><a href="{{ $instructor->facebook }}">
                                            <i class="feather-facebook"></i>
                                        </a>
                                    </li>
                                    @else
                                    @endif

                                    @if(!empty($instructor->twitter))
                                    <li><a href="{{ $instructor->twitter }}">
                                            <i class="feather-twitter"></i>
                                        </a>
                                    </li>
                                    @else
                                    @endif

                                    @if(!empty($instructor->instagram))
                                    <li><a href="{{ $instructor->instagram }}">
                                            <i class="feather-instagram"></i>
                                        </a>
                                    </li>
                                    @else
                                    @endif

                                    @if(!empty($instructor->instagram))
                                    <li>
                                        <a href="{{ $instructor->linkedin }}">
                                            <i class="feather-linkedin"></i>
                                        </a>
                                    </li>
                                    @else
                                    @endif
                                </ul>
                                <ul class="rbt-information-list mt--15">
                                    <li>
                                        <a href="mailto:{{ $instructor->email }}">
                                            <i class="feather-mail"></i> {{ $instructor->email }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-2 offset-lg-2">
                                <div class="feature-sin best-seller-badge text-end h-100">
                                    <span class="rbt-badge-2 w-100 text-center badge-full-height">
                                        <span class="image">
                                            <img src="{{ asset('frontend/assets/images/icons/card-icon-1.png') }}" alt="Onay">
                                        </span> Onaylı Eğitmen
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start Card Area -->
            <div class="rbt-profile-course-area mt--60">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sction-title">
                            <h2 class="rbt-title-style-3">Eğitmene Ait Kurslar</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5 mt--5">

                    @foreach ($courses as $inscourse)
                        <!-- Start Single Card  -->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-sal-delay="150" data-sal="slide-up"
                            data-sal-duration="800">
                            <div class="rbt-card variation-01 rbt-hover">
                                <div class="rbt-card-img">
                                    <a href="{{ url('course/details/' . $inscourse->course_name_slug . '/' . $inscourse->id) }}">
                                        <img src="{{ asset($inscourse->course_image) }}" alt="{{ $inscourse->name }}">

                                        <div class="rbt-badge-3 bg-white">
                                            @php
                                                $originalPrice = $inscourse->selling_price;
                                                $discountedPrice = $inscourse->discount_price;
                                                $discountPercentage = (($originalPrice - $discountedPrice) / $originalPrice) * 100;
                                            @endphp
                                            <span>-{{ round($discountPercentage, 2) }}%</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="rbt-card-body">
                                    <div class="rbt-card-top">
                                        <div class="rbt-review">
                                            @php
                                                $reviewCount = App\Models\Review::where('course_id', $inscourse->id)
                                                    ->where('status', 1)
                                                    ->latest()
                                                    ->get();
                                                $avarageReviews = App\Models\Review::where('course_id', $inscourse->id)
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
                                        <div class="rbt-bookmark-btn">
                                            <a class="rbt-round-btn" id="{{ $inscourse->id }}"
                                                onclick="addToWishList(this.id)" title="İstek Listene Ekle"
                                                href="#">
                                                <i class="feather-heart"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <h4 class="rbt-card-title">
                                        <a href="{{ url('course/details/' . $inscourse->course_name_slug . '/' . $inscourse->id) }}">{{ $inscourse->course_name }}</a>
                                    </h4>

                                    <ul class="rbt-meta">
                                        <li><i class="feather-clock"></i>{{ $inscourse->duration }} Saat Kurs İçeriği
                                        </li>
                                    </ul>

                                    <p class="rbt-card-text">
                                        {{ $inscourse->course_meta_description }}
                                    </p>
                                    <div class="rbt-author-meta mb--10">
                                        <div class="rbt-avater">
                                            <a href="#">
                                                <img src="{{ !empty($inscourse->photo) ? url('upload/instructor_images/' . $inscourse->photo) : url('upload/profile.png') }}"
                                                    alt="{{ $inscourse->name }}">
                                            </a>
                                        </div>
                                        <div class="rbt-author-info">
                                            By <span href="profile.html">{{ $inscourse['user']['name'] }}</span>
                                        </div>
                                    </div>
                                    <div class="rbt-card-bottom">
                                        <div class="rbt-price">
                                            @if ($inscourse->discount_price == null)
                                                <span class="current-price">{{ $inscourse->selling_price }}</span>
                                            @else
                                                <span class="current-price">{{ $inscourse->discount_price }}</span>
                                                <span class="off-price">{{ $inscourse->selling_price }}</span>
                                            @endif
                                        </div>
                                        <a class="rbt-btn-link"
                                            href="{{ url('course/details/' . $inscourse->course_name_slug . '/' . $inscourse->id) }}">
                                            Görüntüle<i class="feather-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->
                    @endforeach


                </div>
            </div>
            <!-- End Card Area -->

            <div class="row">
                <div class="col-lg-12 mt--60">
                    <nav>
                        <ul class="rbt-pagination">
                            {{ $courses->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Style -->
@endsection
