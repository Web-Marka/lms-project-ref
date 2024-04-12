@extends('frontend.master')
@section('home')
    @php
        $section = App\Models\CourseSection::where('course_id', $course->id)
            ->orderBy('id', 'ASC')
            ->get();
    @endphp

    <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default rbt-breadcrumb-style-3">
        <div class="breadcrumb-inner">
            <img src="{{ asset('frontend/assets/images/bg/bg-image-10.jpg') }}" alt="Education Images">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content text-start">
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">{{ $course['category']['category_name'] }}</li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">{{ $course['subcategory']['subcategory_name'] }}</li>
                        </ul>
                        <h2 class="title">{{ $course->course_name }}</h2>
                        <p class="description">{{ $course->course_meta_description }}</p>

                        <div class="d-flex align-items-center mb--20 flex-wrap rbt-course-details-feature">

                            <div class="feature-sin best-seller-badge">
                                <span class="rbt-badge-2">
                                    <span class="image"><img src="{{ asset('upload/e-devlet.png') }}"
                                            alt="Best Seller Icon"></span> E-Devlet Onaylı Sertifika
                                </span>
                            </div>

                            @php
                                $reviewCount = App\Models\Review::where('course_id', $course->id)
                                    ->where('status', 1)
                                    ->latest()
                                    ->get();
                                $avarageReviews = App\Models\Review::where('course_id', $course->id)
                                    ->where('status', 1)
                                    ->avg('rating');
                            @endphp

                            <div class="feature-sin rating">
                                <span>{{ round($avarageReviews, 2) }} -</span>

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

                            <div class="feature-sin total-rating">
                                <span class="rbt-badge-4">( {{ count($reviewCount) }} ) Değerlendirme</span>
                            </div>

                            @php
                                $enrollmentCount = App\Models\Order::where('course_id', $course->id)->count();
                            @endphp

                            <div class="feature-sin total-student">
                                <span class="rbt-badge-4">( {{ $enrollmentCount }} ) Kayıtlı Öğrenci</span>
                            </div>

                        </div>

                        <div class="rbt-author-meta mb--20">
                            <div class="rbt-avater">
                                <a href="{{ route('instructor.details', $course->instructor_id) }}">
                                    <img src="{{ !empty($course->photo) ? url('upload/instructor_images/' . $course->photo) : url('upload/profile.png') }}"
                                        alt="{{ $course['user']['name'] }}">
                                </a>
                            </div>
                            <div class="rbt-author-info">
                                <a
                                    href="{{ route('instructor.details', $course->instructor_id) }}">{{ $course['user']['name'] }}</a>
                            </div>
                            <ul class="rbt-meta ml--20">
                                <li><i class="feather-calendar"></i>
                                    {{ $course->updated_at ? $course->updated_at->format('M d Y') : $course->created_at->format('M d Y') }}
                                </li>
                                <li><i class="feather-globe"></i>{{ $course->language }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="rbt-course-details-area ptb--60">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-8">
                    <div class="course-details-content">
                        <div class="rbt-course-feature-box rbt-shadow-box thuumbnail">
                            <img class="w-100" src="{{ asset($course->course_image) }}" alt="Card image">
                        </div>

                        <div class="rbt-inner-onepage-navigation sticky-top mt--30">
                            <nav class="mainmenu-nav onepagenav">
                                <ul class="mainmenu">
                                    <li class="current">
                                        <a href="#overview">Hakkında</a>
                                    </li>
                                    <li>
                                        <a href="#coursecontent">Video İçeriği</a>
                                    </li>
                                    <li>
                                        <a href="#details">Detaylar</a>
                                    </li>
                                    <li>
                                        <a href="#intructor">Eğitmen</a>
                                    </li>
                                    <li>
                                        <a href="#review">Görüşler</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <!-- Start Course Feature Box  -->
                        <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30 has-show-more"
                            id="overview">
                            <div class="rbt-course-feature-inner has-show-more-inner-content">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">Kurs Hakkında</h4>
                                </div>
                                <p> {!! htmlspecialchars_decode($course->course_content) !!} </p>
                            </div>
                            <div class="rbt-show-more-btn">Ayrıntılar</div>
                        </div>
                        <!-- End Course Feature Box  -->

                        <!-- Start Course Content  -->
                        <div class="course-content rbt-shadow-box coursecontent-wrapper mt--30" id="coursecontent">
                            <div class="rbt-course-feature-inner">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">Kurs Video İçeriği</h4>
                                </div>
                                <div class="rbt-accordion-style rbt-accordion-02 accordion">
                                    <div class="accordion" id="CourseVideoDetailsAccordion">

                                        @foreach ($section as $sec)
                                            @php
                                                $lecture = App\Models\CourseLecture::where('section_id', $sec->id)->get();
                                            @endphp

                                            <div class="accordion-item card">
                                                <h2 class="accordion-header card-header" id="heading{{ $sec->id }}">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $sec->id }}"
                                                        aria-expanded="true" aria-controls="collapse{{ $sec->id }}">

                                                        {{ $sec->section_title }}

                                                    </button>
                                                </h2>

                                                <div id="collapse{{ $sec->id }}" class="accordion-collapse collapse"
                                                    aria-labelledby="heading{{ $sec->id }}"
                                                    data-bs-parent="#CourseVideoDetailsAccordion">

                                                    <div class="accordion-body card-body pr--0">
                                                        <ul class="rbt-course-main-content liststyle">

                                                            @foreach ($lecture as $videobaslik)
                                                                <li>
                                                                    <a>
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                class="text">{{ $videobaslik->lecture_title }}</span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Course Content  -->


                        <!-- Start Course Feature Box  -->
                        <div class="rbt-course-feature-box rbt-shadow-box details-wrapper mt--30" id="details">
                            <div class="row g-5">
                                <!-- Start Feture Box  -->
                                <div class="col-lg-6">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3 mb--20">Sertifika Süreci</h4>
                                    </div>
                                    <ul id="sertifikaSureciList" class="rbt-list-style-1">
                                        @foreach (explode("\n", strip_tags($course->requirements)) as $line)
                                            <li><i class="feather-check"></i>{!! htmlspecialchars_decode($line) !!}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- End Feture Box  -->

                                <!-- Start Feture Box  -->
                                <div class="col-lg-6">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3 mb--20">Sertifika Bilgileri</h4>
                                    </div>
                                    <ul id="sertifikaBilgileriList" class="rbt-list-style-1">
                                        @foreach (explode("\n", strip_tags($course->course_description)) as $line)
                                            <li><i class="feather-check"></i>{!! htmlspecialchars_decode($line) !!}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- End Feture Box  -->
                            </div>
                        </div>
                        <!-- End Course Feature Box  -->

                        <!-- Start Intructor Area  -->
                        <div class="rbt-instructor rbt-shadow-box intructor-wrapper mt--30" id="intructor">
                            <div class="about-author border-0 pb--0 pt--0">
                                <div class="section-title mb--30">
                                    <h4 class="rbt-title-style-3">Eğitmen Bilgileri</h4>
                                </div>
                                <div class="media align-items-center">
                                    <div class="thumbnail">
                                        <a href="{{ route('instructor.details', $course->instructor_id) }}">
                                            <img src="{{ !empty($course->photo) ? url('upload/instructor_images/' . $course->photo) : url('upload/profile.png') }}"
                                                alt="{{ $course['user']['name'] }}">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="author-info">
                                            <h5 class="title">
                                                <a class="hover-flip-item-wrapper"
                                                    href="{{ route('instructor.details', $course->instructor_id) }}">{{ $course['user']['name'] }}</a>
                                            </h5>
                                            <ul class="rbt-meta mb--20 mt--10">
                                                <li>
                                                    <i class="fa fa-star color-warning"></i>
                                                    75,237 Reviews
                                                    <span
                                                        class="rbt-badge-5 ml--5">4.4 Rating
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="rbt-badge-5 ml--5"><i class="feather-video"></i>
                                                        Kurslar : {{ count($instructorCourses) }}
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="content">
                                            <p class="description">
                                                {{ $course['user']['instructor_bio'] }}
                                            </p>

                                            <ul class="social-icon social-default icon-naked justify-content-start">
                                                @if(!empty($course['user']['facebook']))
                                                    <li><a href="{{ $course['user']['facebook'] }}">
                                                            <i class="feather-facebook"></i>
                                                        </a>
                                                    </li>
                                                    @else
                                                    @endif

                                                @if(!empty($course['user']['twitter']))
                                                    <li><a href="{{ $course['user']['twitter'] }}">
                                                            <i class="feather-twitter"></i>
                                                        </a>
                                                    </li>
                                                    @else
                                                @endif

                                                @if(!empty($course['user']['instagram']))
                                                    <li><a href="{{ $course['user']['instagram'] }}">
                                                            <i class="feather-instagram"></i>
                                                        </a>
                                                    </li>
                                                    @else
                                                @endif

                                                @if(!empty($course['user']['linkedin']))
                                                    <li>
                                                        <a href="{{ $course['user']['linkedin'] }}">
                                                            <i class="feather-linkedin"></i>
                                                        </a>
                                                    </li>
                                                    @else
                                                @endif
                                            </ul>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Intructor Area  -->

                        <!-- Start Edu Review List  -->
                        <div class="rbt-review-wrapper rbt-shadow-box review-wrapper mt--30" id="review">
                            <div class="course-content">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">Öğrenci Değerlendirmeleri</h4>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-lg-3">
                                        <div class="rating-box">
                                            <div class="rating-number">{{ round($avarageReviews, 2) }}</div>
                                            <div class="rating">
                                                @if ($avarageReviews == 0)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                @elseif ($avarageReviews == 1 || $avarageReviews < 2)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                @elseif ($avarageReviews == 2 || $avarageReviews < 3)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                @elseif ($avarageReviews == 3 || $avarageReviews < 4)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                @elseif ($avarageReviews == 4 || $avarageReviews < 5)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                @elseif ($avarageReviews == 5 || $avarageReviews < 5)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                @endif
                                            </div>
                                            <span class="sub-title">Değerlendirme</span>
                                        </div>
                                    </div>
                                    @php
                                        $reviewCount = App\Models\Review::where('course_id', $course->id)
                                            ->where('status', 1)
                                            ->select('rating', DB::raw('count(*) as count'))
                                            ->groupBy('rating')
                                            ->orderBy('rating', 'DESC')
                                            ->get();
                                        $totalReviews = $reviewCount->sum('count');
                                        $percentages = [];
                                        for ($i = 5; $i >= 1; $i--) {
                                            $ratingCount = $reviewCount->where('rating', $i)->first();
                                            $count = $ratingCount ? $ratingCount->count : 0;
                                            $percent = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
                                            $percentages[] = [
                                                'rating' => $i,
                                                'percent' => $percent,
                                                'count' => $count,
                                            ];
                                        }
                                    @endphp
                                    <div class="col-lg-9">
                                        <div class="review-wrapper">
                                            @foreach ($percentages as $percentage)
                                                <div class="single-progress-bar">
                                                    <div class="rating-text">
                                                        @for ($i = 0; $i < $percentage['rating']; $i++)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                        @endfor
                                                        @for ($i = 0; $i < 5 - $percentage['rating']; $i++)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-star"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                            </svg>
                                                        @endfor
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{ $percentage['percent'] }}%"
                                                            aria-valuenow="{{ $percentage['percent'] }}"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span class="value-text">{{ number_format($percentage['percent'],2) }}%</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Edu Review List  -->

                        <div class="about-author-list rbt-shadow-box featured-wrapper mt--30 has-show-more">
                            <div class="section-title">
                                <h4 class="rbt-title-style-3">Kurs Yorumları</h4>
                            </div>

                            @php
                                $reviews = App\Models\Review::where('course_id', $course->id)
                                    ->where('status', 1)
                                    ->latest()
                                    ->get();
                            @endphp

                            @foreach ($reviews as $item)
                                <div class="has-show-more-inner-content rbt-featured-review-list-wrapper">
                                    <div class="rbt-course-review about-author">
                                        <div class="media">
                                            <div class="thumbnail">
                                                <a>
                                                    <img src="{{ !empty($item->user->photo) ? url('upload/user_images/' . $item->user->photo) : url('upload/profile.png') }}"
                                                        style="width: 40px; !important" alt="User Images">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                @if ($item->rating !== null && $item->comment !== null)
                                                    <div class="author-info">
                                                        <h5 class="title">
                                                            <span class="hover-flip-item-wrapper">
                                                                {{ $item->user->name }}
                                                            </span>
                                                        </h5>

                                                        <div class="rating">

                                                            @if ($item->rating == null)
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            @elseif($item->rating == 1)
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            @elseif($item->rating == 2)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            @elseif($item->rating == 3)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            @elseif($item->rating == 4)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            @elseif($item->rating == 5)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="content">
                                                        <p class="description">
                                                            {{ $item->comment }}
                                                        </p>
                                                    </div>
                                                @else
                                                    <div class="content">
                                                        <p class="description">
                                                            Bu kurs için henüz yorum yapılmadı
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="rbt-show-more-btn">Daha Fazla Göster</div>
                        </div>
                    </div>
                    <div class="related-course mt--60">
                        <div class="row g-5 align-items-end mb--40">
                            <div class="col-lg-8 col-md-8 col-12">
                                <div class="section-title">
                                    <span class="subtitle bg-pink-opacity">Eğitmenin Popüler Kursları</span>
                                    <h4 class="title"><strong
                                            class="color-primary">{{ $course['user']['name'] }}</strong> Ait Diğer Kurslar
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="row g-5">

                            @php
                                $courseCount = 0;
                            @endphp

                            @foreach ($instructorCourses as $insCourse)
                                @if ($courseCount < 2)
                                    <!-- Start Single Card  -->
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12" data-sal-delay="150"
                                        data-sal="slide-up" data-sal-duration="800">
                                        <div class="rbt-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a
                                                    href="{{ url('course/details/' . $insCourse->course_name_slug . '/' . $insCourse->id) }}">
                                                    <img src="{{ asset($insCourse->course_image) }}"
                                                        alt="{{ $insCourse->course_name }}">
                                                    <div class="rbt-badge-3 bg-white">
                                                        @php
                                                            $discount = null;
                                                            if (!is_null($insCourse->discount_price)) {
                                                                $amount = $insCourse->selling_price - $insCourse->discount_price;
                                                                $discount = ($amount / $insCourse->selling_price) * 100;
                                                            }
                                                        @endphp
                                                        <span>{{ is_null($discount) ? 'Yeni' : round($discount) . '%' }}</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <div class="rbt-card-top">
                                                    <div class="rbt-review">
                                                        @php
                                                            $reviewCount = App\Models\Review::where('course_id', $insCourse->id)
                                                                ->where('status', 1)
                                                                ->latest()
                                                                ->get();
                                                            $avarageReviews = App\Models\Review::where('course_id', $insCourse->id)
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
                                                        <a class="rbt-round-btn" id="{{ $course->id }}"
                                                            onclick="addToWishList(this.id)" title="İstek Listene Ekle"
                                                            href="#">
                                                            <i class="feather-heart"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <h4 class="rbt-card-title">
                                                    <a href="{{ url('course/details/' . $insCourse->course_name_slug . '/' . $insCourse->id) }}">
                                                        {{ $insCourse->course_name }}</a>
                                                </h4>

                                                <ul class="rbt-meta">
                                                    <li><i class="feather-clock"></i>{{ $insCourse->duration }} Saat Kurs
                                                        İçeriği</li>
                                                </ul>

                                                <p class="rbt-card-text">{{ Illuminate\Support\Str::words($insCourse->course_meta_description, 10) }}</p>
                                                <div class="rbt-author-meta mb--10">
                                                    <div class="rbt-avater">
                                                        <a
                                                            href="{{ route('instructor.details', $course->instructor_id) }}">
                                                            <img src="{{ !empty($course->photo) ? url('upload/instructor_images/' . $course->photo) : url('upload/profile.png') }}"
                                                                alt="{{ $insCourse['user']['name'] }}">
                                                        </a>
                                                    </div>
                                                    <div class="rbt-author-info">
                                                        By <a href="{{ route('instructor.details', $course->instructor_id) }}">{{ $insCourse['user']['name'] }}</a>
                                                    </div>
                                                </div>
                                                <div class="rbt-card-bottom">
                                                    <div class="rbt-price">
                                                        @if ($insCourse->discount_price == null)
                                                            <span
                                                                class="current-price">{{ $insCourse->selling_price }}</span>
                                                        @else
                                                            <span
                                                                class="current-price">{{ $insCourse->discount_price }}</span>
                                                            <span class="off-price">{{ $insCourse->selling_price }}</span>
                                                        @endif
                                                    </div>
                                                    <a class="rbt-btn-link"
                                                        href="{{ url('course/details/' . $insCourse->course_name_slug . '/' . $insCourse->id) }}">
                                                        Görüntüle<i class="feather-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->

                                    @php
                                        $courseCount++;
                                    @endphp
                                @else
                                @break
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="course-sidebar sticky-top rbt-shadow-box course-sidebar-top rbt-gradient-border">
                    <div class="inner">

                        <!-- Start Viedo Wrapper  -->
                        <a class="video-popup-with-text video-popup-wrapper text-center popup-video sidebar-video-hidden mb--15"
                            href="{{ $course->video }}">
                            <div class="video-content">
                                <img class="w-100 rbt-radius" src="{{ asset($course->course_image) }}"
                                    alt="Video Images">
                                <div class="position-to-top">
                                    <span class="rbt-btn rounded-player-2 with-animation">
                                        <span class="play-icon"></span>
                                    </span>
                                </div>
                                <span class="play-view-text d-block color-white"><i class="feather-eye"></i>
                                    Görüntüle</span>
                            </div>
                        </a>
                        <!-- End Viedo Wrapper  -->

                        @php
                            $discount = null;

                            if (!is_null($course->discount_price)) {
                                $amount = $course->selling_price - $course->discount_price;
                                $discount = ($amount / $course->selling_price) * 100;
                            }
                        @endphp

                        <div class="content-item-content">
                            <div class="rbt-price-wrapper d-flex flex-wrap align-items-center justify-content-between">
                                <div class="rbt-price">
                                    @if ($course->discount_price == null)
                                        <span class="current-price">₺ {{ $course->selling_price }}</span>
                                    @else
                                        <span class="current-price">₺ {{ $course->discount_price }}</span>
                                        <span class="off-price">₺ {{ $course->selling_price }}</span>
                                    @endif
                                </div>
                                <div class="discount-time">
                                    <span class="rbt-badge color-danger bg-color-danger-opacity">
                                        {{ is_null($discount) ? 'Yeni' : round($discount) . '%' }}</span>
                                </div>
                            </div>

                            <div class="add-to-card-button mt--15">
                                <button type="submit"
                                    class="rbt-btn btn-gradient icon-hover w-100 d-block text-center"
                                    onclick="addToCart({{ $course->id }}, '{{ $course->course_name }}',
                                        '{{ $course->instructor_id }}', '{{ $course->course_name_slug }}')">
                                    <span class="btn-text">Sepete Ekle</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </button>
                            </div>

                            <div class="buy-now-btn mt--15">
                                <button class="rbt-btn btn-border icon-hover w-100 d-block text-center"
                                    onclick="buyCourse({{ $course->id }}, '{{ $course->course_name }}',
                                    '{{ $course->instructor_id }}', '{{ $course->course_name_slug }}')">
                                    <span class="btn-text">Satın Al</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </button>
                            </div>

                            <span class="subtitle"><i class="feather-users"></i> Uzman Eğitmen Kadrosu</span>

                            <div class="rbt-widget-details has-show-more">
                                <ul class="has-show-more-inner-content rbt-course-details-list-wrapper">
                                    <li><span>Kurs Süresi</span><span
                                            class="rbt-feature-value rbt-badge-5">{{ $course->duration }}</span>
                                    </li>
                                    @php
                                        $lecture = App\Models\CourseLecture::where('course_id', $course->id)->get();
                                    @endphp
                                    <li><span>Video Sayısı</span><span
                                            class="rbt-feature-value rbt-badge-5">{{ count($lecture) }}</span></li>
                                    <li><span>Eğitim Dili</span><span
                                            class="rbt-feature-value rbt-badge-5">{{ $course->language }}</span></li>
                                    <li><span>Sertifika</span><span
                                            class="rbt-feature-value rbt-badge-5">{{ $course->certificate }}</span>
                                    </li>
                                    <li><span>Mobil ve TV'den Erişim</span><span
                                            class="rbt-feature-value rbt-badge-5">Evet</span></li>
                                    <li><span>Eğitim Türü</span><span
                                            class="rbt-feature-value rbt-badge-5">Online</span></li>
                                </ul>
                                <div class="rbt-show-more-btn">Ayrıntılar</div>
                            </div>

                            @php
                                $iletisim = App\Models\SiteSetting::find(1);
                            @endphp

                            <div class="social-share-wrapper mt--30 text-center">
                                <div class="rbt-post-share d-flex align-items-center justify-content-center">
                                    <ul
                                        class="social-icon social-default transparent-with-border justify-content-center">
                                        <li><a href="{{ $iletisim->facebook }}">
                                                <i class="feather-facebook"></i>
                                            </a>
                                        </li>
                                        <li><a href="{{ $iletisim->twitter }}">
                                                <i class="feather-twitter"></i>
                                            </a>
                                        </li>
                                        <li><a href="{{ $iletisim->instagram }}">
                                                <i class="feather-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <hr class="mt--20">

                                <div class="contact-with-us text-center">
                                    <p>Kurs Hakkında Detaylı Bilgi</p>
                                    <p class="rbt-badge-2 mt--10 justify-content-center w-100">
                                        <i class="feather-phone mr--5"></i>İletişim:
                                        <a href="tel:{{ $iletisim->telefon }}">
                                            <strong>
                                                {{ $iletisim->telefon }}
                                            </strong>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rbt-separator-mid">
    <div class="container">
        <hr class="rbt-separator m-0">
    </div>
</div>

<div class="rbt-related-course-area bg-color-white pt--60 rbt-section-gapBottom">
    <div class="container">
        <div class="section-title mb--30">
            <span class="subtitle bg-primary-opacity">Benzer Kurslar</span>
            <h4 class="title">{{ $course['category']['category_name'] }} Kursları </h4>
        </div>
        <div class="row g-5">

            @foreach ($relatedCourse as $related)
                <!-- Start Single Card  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="{{ url('course/details/' . $related->course_name_slug . '/' . $related->id) }}">
                                <img src="{{ asset($related->course_image) }}" alt="{{ $related->course_name }}">
                                <div class="rbt-badge-3 bg-white">
                                    @php
                                        $discount = null;

                                        if (!is_null($related->discount_price)) {
                                            $amount = $related->selling_price - $related->discount_price;
                                            $discount = ($amount / $related->selling_price) * 100;
                                        }
                                    @endphp

                                    <span>{{ is_null($discount) ? 'Yeni' : round($discount) . '%' }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <div class="rbt-card-top">
                                <div class="rbt-review">
                                    <div class="rating">
                                        @php
                                            $reviewCount = App\Models\Review::where('course_id', $related->id)
                                                ->where('status', 1)
                                                ->latest()
                                                ->get();
                                            $avarageReviews = App\Models\Review::where('course_id', $related->id)
                                                ->where('status', 1)
                                                ->avg('rating');
                                        @endphp
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
                                <div class="rbt-bookmark-btn">
                                    <a class="rbt-round-btn" id="{{ $course->id }}"
                                        onclick="addToWishList(this.id)" title="İstek Listene Ekle" href="#">
                                        <i class="feather-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <h4 class="rbt-card-title"><a
                                    href="{{ url('course/details/' . $related->course_name_slug . '/' . $related->id) }}">
                                    {{ $related->course_name }}</a>
                            </h4>
                            <ul class="rbt-meta">
                                <li><i class="feather-clock"></i>{{ $related->duration }} Saat Kurs İçeriği</li>
                            </ul>
                            <p class="rbt-card-text">{{ Illuminate\Support\Str::words($related->course_meta_description, 10) }}</p>

                            <div class="rbt-author-meta mb--20">
                                <div class="rbt-avater">
                                    <a href="{{ route('instructor.details', $related->instructor_id) }}">
                                        <img src="{{ !empty($related->photo) ? url('upload/instructor_images/' . $related->photo) : url('upload/profile.png') }}"
                                        alt="{{ $related['user']['name'] }}">
                                    </a>
                                </div>
                                <div class="rbt-author-info">
                                    By <a
                                        href="{{ route('instructor.details', $related->instructor_id) }}">{{ $related['user']['name'] }}</a>
                                </div>
                            </div>
                            <div class="rbt-card-bottom">
                                <div class="rbt-price">
                                    @if ($related->discount_price == null)
                                        <span class="current-price">₺ {{ $related->selling_price }}</span>
                                    @else
                                        <span class="current-price">₺ {{ $related->discount_price }}</span>
                                        <span class="off-price">₺ {{ $related->selling_price }}</span>
                                    @endif
                                </div>
                                <a class="rbt-btn-link"
                                    href="{{ url('course/details/' . $related->course_name_slug . '/' . $related->id) }}">
                                    Görüntüle<i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->
            @endforeach

        </div>
    </div>
</div>

@endsection
