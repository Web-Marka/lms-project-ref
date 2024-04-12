@extends('instructor.instructor_dashboard')
@section('instructorcontent')
    <div class="col-lg-9">
        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
            <div class="content">
                <div class="section-title d-flex justify-content-between ">
                    <h4 class="rbt-title-style-3">Kurs Video Başlığı</h4>
                    <a href="{{ route('add.course.lecture',['id' => $lecture->course_id]) }}" class="rbt-btn btn-gradient btn-xs">Geri</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="{{ route('update.lecture') }}" method="post"
                            class="rbt-profile-row rbt-default-form row row--15">
                            @csrf
                            <input type="hidden" name="id" value="{{ $lecture->id }}">

                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30 edu-bg-gray">
                                    <label for="lecture_title">Kurs Video Başlığı</label>
                                    <input id="lecture_title" name="lecture_title" type="text" value="{{ $lecture->lecture_title }}">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30 edu-bg-gray">
                                    <label for="url">Kurs Video URL</label>
                                    <input id="url" name="url" type="text" value="{{ $lecture->url }}">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30 edu-bg-gray">
                                    <label for="content">Kurs Video İçeriği</label>
                                    <textarea id="content" name="content" type="text">{{ $lecture->content }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <hr class="mt--10 mb--20">
                            </div>

                            <div class="col-12 mt--20">
                                <div class="rbt-form-group">
                                    <button type="submit" class="rbt-btn btn-gradient">Kaydet</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
