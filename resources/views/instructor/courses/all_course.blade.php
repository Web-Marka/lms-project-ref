@extends('instructor.instructor_dashboard')
@section('instructorcontent')
    <div class="col-lg-9">
        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
            <div class="content">
                <div class="section-title">
                    <h4 class="rbt-title-style-3">Kurslar
                    </h4>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="publish-4" role="tabpanel" aria-labelledby="publish-tab-4">
                        <div class="row g-5">

                            @foreach ($courses as $key=>$item)

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="rbt-card variation-01 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="{{ route ('edit.course',$item->id) }}">
                                            <img src="{{ asset($item->course_image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="rbt-card-body">
                                        <h4 class="rbt-card-title"><a href="{{ route ('edit.course',$item->id) }}">{{ $item->course_name }}</a>
                                        </h4>
                                        <ul class="rbt-meta">
                                            <li><i class="feather-book"></i>{{ $item['category']['category_name'] }}</li>
                                        </ul>

                                        <div class="rbt-card-bottom">
                                            <div class="rbt-price">
                                                @if ($item->discount_price == NULL)
                                                <span class="current-price">₺ {{ $item->selling_price }}</span>
                                                @else
                                                <span class="current-price">₺ {{ $item->discount_price }}</span>
                                                <span class="off-price">₺ {{ $item->selling_price }}</span>
                                                @endif
                                            </div>
                                            <a class="rbt-btn-link left-icon" href="{{ route ('edit.course',$item->id) }}"><i class="feather-edit"></i> Düzenle</a>
                                            <a class="rbt-btn-link left-icon" href="{{ route ('add.course.lecture',$item->id) }}"><i class="feather-video"></i> İçerik</a>
                                            <a class="rbt-btn-link left-icon" href="{{ route ('delete.course',$item->id) }}"><i class="feather-trash"></i> Sil</a>
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
@endsection
