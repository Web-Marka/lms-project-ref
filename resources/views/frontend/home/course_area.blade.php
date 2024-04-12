<div class="rbt-course-area bg-color-extra2 rbt-section-gap">
    <div class="container">
        <div class="row mb--60">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <span class="subtitle bg-secondary-opacity">Popüler Kurslar</span>
                    <h2 class="title">Hayalinizdeki Kariyeriniz İçin <br />Hedeflerinizi Ertelemeyin.</h2>
                </div>
            </div>
        </div>
        <div class="row g-5">

            @php
                $courses = App\Models\Course::where('status','1')->orderBy('id','ASC')->limit(6)->get();
            @endphp

            @foreach ($courses as $item)

            <!-- Start Single Course  -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="rbt-card variation-01 rbt-hover">
                    <div class="rbt-card-img">
                        <a href="{{ url('course/details/'.$item->course_name_slug.'/'.$item->id) }}">
                            <img src="{{ asset($item->course_image) }}" alt="kurs görseli">
                            <div class="rbt-badge-3 bg-white">
                                @php
                                $discount = null;
                                    if (!is_null($item->discount_price)) {
                                    $amount = $item->selling_price - $item->discount_price;
                                    $discount = ($amount / $item->selling_price) * 100;
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
                                    $reviewCount = App\Models\Review::where('course_id', $item->id)
                                        ->where('status', 1)
                                        ->latest()
                                        ->get();
                                    $avarageReviews = App\Models\Review::where('course_id', $item->id)
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
                            <div class="rbt-bookmark-btn">
                                <a class="rbt-round-btn" id="{{ $item->id }}" onclick="addToWishList(this.id)" title="İstek Listene Ekle" href="#">
                                    <i class="feather-heart"></i>
                                </a>
                            </div>
                        </div>

                        <h4 class="rbt-card-title"><a href="{{ url('course/details/'.$item->course_name_slug.'/'.$item->id) }}">{{ $item->course_name }}</a>
                        </h4>
                        <ul class="rbt-meta">
                            <li><i class="feather-clock"></i>{{ $item->duration }} Saat Kurs İçeriği</li>
                        </ul>
                        <p class="rbt-card-text">{{ Illuminate\Support\Str::words($item->course_meta_description, 10) }}</p>
                        <div class="rbt-author-meta mb--20">
                            <div class="rbt-avater">
                                <a href="#">
                                    <img src="{{ !empty($item->photo) ? url('upload/instructor_images/' . $item->photo) : url('upload/profile.png') }}">
                                </a>
                            </div>
                            <div class="rbt-author-info">
                                By <a href="{{ route('instructor.details', $item->instructor_id) }}">
                                    {{ $item['user']['name'] }}</a>
                            </div>
                        </div>

                        <div class="rbt-card-bottom">
                            <div class="rbt-price">
                                @if ($item->discount_price == NULL)
                                <span class="current-price">₺ {{ $item->selling_price }}</span>
                                @else
                                <span class="current-price">₺ {{ $item->discount_price }}</span>
                                <span class="off-price">₺ {{ $item->selling_price }}</span>
                                @endif
                            </div>
                            <a class="rbt-btn-link" href="{{ url('course/details/'.$item->course_name_slug.'/'.$item->id) }}">
                                Ayrıntılar<i class="feather-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Course  -->

            @endforeach

        </div>

    </div>
</div>
