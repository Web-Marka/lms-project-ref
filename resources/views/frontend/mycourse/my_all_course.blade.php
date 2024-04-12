@extends('frontend.dashboard.user_dashboard')
@section('userdashboard')
    <div class="col-lg-9">
        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
            <div class="content">
                <div class="section-title">
                    <h4 class="rbt-title-style-3">Kurslarım
                    </h4>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="publish-4" role="tabpanel" aria-labelledby="publish-tab-4">
                        <div class="row g-5">

                            @foreach ($mycourse as $item)

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="rbt-card variation-01 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="{{ route ('course.view',$item->course_id) }}">
                                            <img src="{{ asset($item->course->course_image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="rbt-card-body">
                                        <h4 class="rbt-card-title"><a href="{{ route ('course.view',$item->course_id) }}">{{ $item->course->course_name }}</a>
                                        </h4>
                                        <ul class="rbt-meta">
                                            <li><i class="feather-clock"></i>{{ $item->course->duration }} Saat</li>
                                            <li><i class="feather-users"></i>{{ $item->course->user->name }}</li>
                                        </ul>

                                        <div class="rbt-card-bottom">
                                            <a class="rbt-btn btn-sm bg-primary-opacity w-100 text-center" href="{{ route ('course.view',$item->course_id) }}">Öğrenmeye Başla</a>
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
