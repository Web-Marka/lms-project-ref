@extends('frontend.master')
@section('home')
    <div class="rbt-page-banner-wrapper">
        <div class="rbt-banner-image"></div>
        <div class="rbt-banner-content">
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="page-list">
                                <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}">Anasayfa</a></li>
                                <li>
                                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active">Kurslar</li>
                            </ul>
                            <div class=" title-wrapper">
                                <h1 class="title mb--0">Kurslar</h1>
                                <span href="#" class="rbt-badge-2">
                                    <span class="image"><img src="{{ asset('upload/e-devlet.png') }}"
                                            alt="Best Seller Icon"></span> Toplam {{ count($courses) }} E-Devlet Sertifikalı
                                    Kurs
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->
            <!-- Start Course Top  -->
            <div class="rbt-course-top-wrapper mt--40">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-center">
                                <div class="rbt-short-item switch-layout-container">
                                    <ul class="course-switch-layout">
                                        <li class="course-switch-item"><button class="rbt-grid-view active"
                                                title="Grid Layout"><i class="feather-grid"></i> <span
                                                    class="text"></span></button></li>
                                        <li class="course-switch-item"><button class="rbt-list-view" title="List Layout"><i
                                                    class="feather-list"></i> <span class="text"></span></button></li>
                                    </ul>
                                </div>
                                <div class="rbt-short-item">
                                    <span class="course-index">{{ count($courses) }} Sonuç Gösteriliyor</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-center justify-content-start justify-content-lg-end">
                                <div class="rbt-short-item">
                                    <form id="filterForm" action="{{ route('filter.courses') }}" method="GET">
                                        @csrf
                                        <div class="filter-select rbt-modern-select search-by-category">
                                            <select id="sortSelect" name="sortSelect" data-size="7" onchange="submitForm()">
                                                <option value="default">Sırala</option>
                                                <option value="newest">Yeni</option>
                                                <option value="popular">Popüler</option>
                                                <option value="price-desc">Fiyat Azalan</option>
                                                <option value="price-asc">Fiyat Artan</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Course Top  -->
        </div>
    </div>

    <!-- Start Card Style -->
    <div class="rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row row--30 gy-5">
                <div class="col-lg-3 order-2 order-lg-1">
                    <aside class="rbt-sidebar-widget-wrapper">

                        <!-- Start Widget Area  -->
                        <div class="rbt-single-widget rbt-widget-search">
                            <div class="inner">
                                <form id="searchForm" action="{{ route('search.courses') }}" class="rbt-search-style-1" method="GET">
                                    <input type="text" id="searchInput" name="searchInput" placeholder="Kurs Ara">
                                    <button type="submit" class="search-btn"><i class="feather-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- End Widget Area  -->

                        <!-- Start Widget Area  -->
                        <div class="rbt-single-widget rbt-widget-categories has-show-more">
                            <div class="inner">
                                <h4 class="rbt-widget-title">Kategoriler</h4>
                                <ul class="rbt-sidebar-list-wrapper categories-list-check has-show-more-inner-content">

                                    @foreach ($categories as $category)
                                        @php
                                            $catcount = App\Models\Course::where('category_id', $category->id)
                                                ->where('status', '1')
                                                ->count();
                                        @endphp

                                        <li class="rbt-check-group">
                                            <input id="cat-list-{{ $category->id }}" type="checkbox" name="cat-list-{{ $category->id }}"
                                                onclick="window.location='{{ url('category/'.$category->category_slug.'/'.$category->id) }}'">
                                            <label for="cat-list-{{ $category->id }}">{{ $category->category_name }}
                                                <span class="rbt-lable count">{{ $catcount }}</span>
                                            </label>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="rbt-show-more-btn">Daha Fazla Göster</div>
                        </div>
                        <!-- End Widget Area  -->

                        <!-- Start Eğitmen Area  -->
                        <div class="rbt-single-widget rbt-widget-instructor">
                            <div class="inner">
                                <h4 class="rbt-widget-title">Eğitmenler</h4>
                                <ul class="rbt-sidebar-list-wrapper instructor-list-check">
                                    @php
                                        $instructorsWithCourseCounts = $instructor->groupBy('user.name')->map(function ($group) {
                                            return [
                                                'instructor' => $group->first()->user,
                                                'course_count' => $group->where('status', '1')->count()
                                            ];
                                        });
                                    @endphp

                                    @foreach ($instructorsWithCourseCounts as $instructor)
                                        <li class="rbt-check-group">
                                            <input id="ins-list-{{ $instructor['instructor']->id }}" type="checkbox" name="ins-list-{{ $instructor['instructor']->id }}"
                                            onclick="window.location='{{ route('instructor.details', $instructor['instructor']->id) }}'">
                                            <label for="ins-list-{{ $instructor['instructor']->id }}"> {{ $instructor['instructor']->name }}
                                                <span class="rbt-lable count">{{ $instructor['course_count'] }}</span>
                                            </label>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <!-- End Eğitmen Area  -->

                    </aside>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="rbt-course-grid-column">

                        @foreach ($courses as $course)
                            <!-- Start Ürün Card  -->
                            <div class="course-grid-3">
                                <div class="rbt-card variation-01 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="{{ url('course/details/' . $course->course_name_slug . '/' . $course->id) }}">
                                            <img src="{{ asset($course->course_image) }}"
                                                alt="{{ asset($course->course_name) }}">
                                            <div class="rbt-badge-3 bg-white">
                                                @php
                                                    $discount = null;

                                                    if (!is_null($course->discount_price)) {
                                                        $amount = $course->selling_price - $course->discount_price;
                                                        $discount = ($amount / $course->selling_price) * 100;
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
                                                    $reviewCount = App\Models\Review::where('course_id', $course->id)
                                                        ->where('status', 1)
                                                        ->latest()
                                                        ->get();
                                                    $avarageReviews = App\Models\Review::where('course_id', $course->id)
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

                                        <h4 class="rbt-card-title"><a
                                                href="{{ url('course/details/' . $course->course_name_slug . '/' . $course->id) }}">{{ $course->course_name }}</a>
                                        </h4>

                                        <ul class="rbt-meta">
                                            <li><i class="feather-clock"></i>{{ $course->duration }} Saat Kurs İçeriği
                                            </li>
                                        </ul>

                                        <p class="rbt-card-text">{{ Illuminate\Support\Str::words($course->course_meta_description, 10) }}</p>
                                        <div class="rbt-author-meta mb--10">
                                            <div class="rbt-avater">
                                                <a href="{{ route('instructor.details', $course->instructor_id) }}">
                                                    <img src="{{ !empty($course->photo) ? url('upload/instructor_images/' . $course->photo) : url('upload/profile.png') }}"
                                                        alt="{{ asset('upload/instructor_images/' . $course['user']['name']) }}">
                                                </a>
                                            </div>
                                            <div class="rbt-author-info">
                                                By <a href="{{ route('instructor.details', $course->instructor_id) }}">
                                                    {{ $course['user']['name'] }}
                                            </div>
                                        </div>
                                        <div class="rbt-card-bottom">
                                            <div class="rbt-price">
                                                @if ($course->discount_price == null)
                                                    <span class="current-price">₺ {{ $course->selling_price }}</span>
                                                @else
                                                    <span class="current-price">₺ {{ $course->discount_price }}</span>
                                                    <span class="off-price">₺ {{ $course->selling_price }}</span>
                                                @endif
                                            </div>
                                            <a class="rbt-btn-link"
                                                href="{{ url('course/details/' . $course->course_name_slug . '/' . $course->id) }}">
                                                Görüntüle<i class="feather-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Ürün Card  -->
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt--60">
                            <nav>
                                <ul class="rbt-pagination">
                                    {{ $courses->links('vendor.pagination.custom') }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Style -->
    <script>
        function submitForm() {
            document.getElementById("filterForm").submit();
        }
    </script>
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function(event) {
            if (event.key === 'Enter' || event.target.id === 'searchIcon') {
                document.getElementById('searchForm').submit();
            }
        });
    </script>

@endsection
