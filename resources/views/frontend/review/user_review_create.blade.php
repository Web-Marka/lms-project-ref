@extends('frontend.dashboard.user_dashboard')
@section('userdashboard')

<div class="col-lg-9">
    <!-- Start Enrole Course  -->
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
        <div class="content">
            <div class="section-title">
                <h4 class="rbt-title-style-3">Yorumlarım</h4>
            </div>
            <div class="row">
                <!-- Görsel Kısım -->
                <div class="rbt-dashboard-content-wrapper col-lg-6">
                    <img src="{{ asset($courseContent->course_image) }}" class="tutor-bg-photo bg_image height-245" alt="instructor photo">
                    <div class="content-wrapper overflow-hidden pt--30 pb--30">
                        <div class="content text-left">
                            <h5 class="mb--5">{{ $courseContent->course_name }}</h5>
                        </div>
                    </div>
                </div>
                <!-- Yorum ve Değerlendirme Kısmı -->
                <div class="col-lg-6">
                    <form class="rbt-profile-row rbt-default-form row row--15" action="{{ route('store.review') }}" method="POST">
                        @csrf
                        <div class="rbt-form-group mt--20">
                            <label for="comment">Değerlendirme</label>
                        </div>
                        <div class="stars">
                            <input class="star star-5" id="star-5" type="radio" name="rate" value="5"/>
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" name="rate" value="4"/>
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" name="rate" value="3"/>
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" name="rate" value="2"/>
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" name="rate" value="1"/>
                            <label class="star star-1" for="star-1"></label>
                        </div>

                        <input type="hidden" name="course_id" value="{{ $courseContent->id }}">
                        <input type="hidden" name="instructor_id" value="{{ $courseContent->instructor_id }}">

                        <div class="rbt-form-group mt--20">
                            <label for="comment">Yorum</label>
                            <textarea id="comment" name="comment" type="text"></textarea>
                        </div>

                        <div class="col-12 mt--20">
                            <div class="rbt-form-group">
                                <button class="rbt-btn rbt-switch-btn btn-gradient radius-round btn-sm" type="submit">Yorumu Gönder
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
