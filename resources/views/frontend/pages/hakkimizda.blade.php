@extends('frontend.master')
@section('home')

<div class="rbt-about-area about-style-1 bg-color-extra2 rbt-section-gap">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="thumbnail-wrapper">
                    <div class="thumbnail image-1">
                        <img data-parallax='{"x": 0, "y": -20}' src="{{ asset($hakkimizda->img_medium) }}" alt="hakkımızda görsel">
                    </div>
                    <div class="thumbnail image-2 d-none d-xl-block">
                        <img data-parallax='{"x": 0, "y": 60}' src="{{ asset($hakkimizda->img_small) }}" alt="hakkımızda görsel">
                    </div>
                    <div class="thumbnail image-3 d-none d-md-block">
                        <img data-parallax='{"x": 0, "y": 80}' src="{{ asset($hakkimizda->img_large) }}" alt="hakkımızda görsel">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="inner pl--50 pl_sm--0 pl_md--0">
                    <div class="section-title text-start">
                        <span class="subtitle bg-coral-opacity">Hakkımızda</span>
                        <h2 class="title">{{ $hakkimizda->main_title }}</h2>
                    </div>

                    <p class="description mt--30">{{ $hakkimizda->main_desc }}</p>

                    <!-- Start Feature List  -->

                    <div class="rbt-feature-wrapper mt--20 ml_dec_20">
                        <div class="rbt-feature feature-style-2 rbt-radius">
                            <div class="icon bg-pink-opacity">
                                <i class="feather-book-open"></i>
                            </div>
                            <div class="feature-content">
                                <h6 class="feature-title">{{ $hakkimizda->main_mini_title_first }}</h6>
                                <p class="feature-description">{{ $hakkimizda->main_mini_title_first_desc }}</p>
                            </div>
                        </div>

                        <div class="rbt-feature feature-style-2 rbt-radius">
                            <div class="icon bg-primary-opacity">
                                <i class="feather-bookmark"></i>
                            </div>
                            <div class="feature-content">
                                <h6 class="feature-title">{{ $hakkimizda->main_mini_title_second }}</h6>
                                <p class="feature-description">{{ $hakkimizda->main_mini_title_second_desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rbt-about-area about-style-1 bg-color-white rbt-section-gap">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-6">
                <div class="content">
                    <h2 class="title mb--0" data-sal="slide-up" data-sal-duration="700">{{ $hakkimizda->second_title }}</h2>
                </div>
            </div>
            <div class="col-lg-6" data-sal="slide-up" data-sal-duration="700">
                <p class="mb--40 mb_sm--20">{{ $hakkimizda->second_desc }}</p>
            </div>
        </div>
    </div>
</div>

<div class="rbt-about-area about-style-1 bg-color-extra2 rbt-section-gap">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-4">
                <div class="content">
                    <h2 class="title" data-sal="slide-up" data-sal-duration="700">{{ $hakkimizda->third_title }}</h2>
                </div>
            </div>
            <div class="col-lg-4" data-sal="slide-up" data-sal-duration="700">
                <p>{{ $hakkimizda->third_desc_one }}</p>
            </div>
            <div class="col-lg-4" data-sal="slide-up" data-sal-duration="700">
                <p>{{ $hakkimizda->third_desc_two }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
