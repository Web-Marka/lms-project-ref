<div class="rbt-team-area bg-color-white rbt-section-gap">
    <div class="container">
        <div class="row mb--60">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <span class="subtitle bg-primary-opacity">Eğitmenler</span>
                    <h2 class="title">Alanında Uzman Eğitmenler</h2>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="rbt-team-tab-content tab-content" id="myTabContent">
                    @php
                        $instructors = App\Models\User::where('role','instructor')->limit(6)->get();
                        $i = 1;
                    @endphp
                    @foreach ($instructors as $instructor)
                        <div class="tab-pane fade @if ($i == 1) show active @endif" id="team-tab{{ $i }}" role="tabpanel" aria-labelledby="team-tab{{ $i }}-tab">
                            <div class="inner">
                                <div class="rbt-team-thumbnail">
                                    <div class="thumb">
                                        <img src="{{ !empty($instructor->photo) ? url('upload/instructor_images/' . $instructor->photo) : url('upload/profile.png') }}"
                                        alt="{{ $instructor->name }}">
                                    </div>
                                </div>
                                <div class="rbt-team-details">
                                    <div class="author-info">
                                        <h4 class="title">{{ $instructor->name }}</h4>
                                        <span class="designation theme-gradient">{{ $instructor->designation }}</span>
                                        <span class="team-form">
                                            <i class="feather-map-pin"></i>
                                            <span class="location">{{ $instructor->address }}</span>
                                        </span>
                                    </div>
                                    <p>{{ $instructor->bio }}</p>
                                    <ul class="social-icon social-default mt--20 justify-content-start">
                                        <li><a href="{{ $instructor->facebook }}"><i class="feather-facebook"></i></a></li>
                                        <li><a href="{{ $instructor->twitter }}"><i class="feather-twitter"></i></a></li>
                                        <li><a href="{{ $instructor->instagram }}"><i class="feather-instagram"></i></a></li>
                                    </ul>
                                    <ul class="rbt-information-list mt--25">
                                        <li><a href="#"><i class="feather-phone"></i>{{ $instructor->phone }}</a></li>
                                        <li><a href="mailto:{{ $instructor->email }}"><i class="feather-mail"></i>{{ $instructor->email }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                    <div class="top-circle-shape"></div>
                </div>
            </div>

            <div class="col-lg-5">
                <ul class="rbt-team-tab-thumb nav nav-tabs" id="myTab" role="tablist">
                    @php $i = 1; @endphp
                    @foreach ($instructors as $instructor)
                        <li>
                            <a class="@if ($i == 1) active @endif" id="team-tab{{ $i }}-tab" data-bs-toggle="tab" data-bs-target="#team-tab{{ $i }}" role="tab" aria-controls="team-tab{{ $i }}" aria-selected="@if ($i == 1) true @else false @endif">
                                <div class="rbt-team-thumbnail">
                                    <div class="thumb">
                                        <img src="{{ !empty($instructor->photo) ? url('upload/instructor_images/' . $instructor->photo) : url('upload/profile.png') }}" alt="{{ $instructor->name }}">
                                    </div>
                                </div>
                            </a>
                        </li>
                        @php $i++; @endphp
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
