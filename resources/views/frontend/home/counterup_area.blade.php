@php
    $counter = App\Models\Title::find(1);
@endphp
<div class="rbt-counterup-area bg-color-extra2 rbt-section-gapBottom default-callto-action-overlap" style="padding-top: 100px;">
    <div class="container">
        <div class="row mb--60">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <span class="subtitle bg-primary-opacity">{{ $counter->counter_badge }}</span>
                    <h2 class="title">{{ $counter->counter_title }}</h2>
                </div>
            </div>
        </div>
        <div class="row g-5 hanger-line">
            <!-- Start Single Counter  -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                    <div class="top-circle-shape"></div>
                    <div class="inner">
                        <div class="rbt-round-icon">
                            <img src="{{ asset('frontend/assets/images/icons/counter-01.png') }}" alt="Icons Images">
                        </div>
                        <div class="content">
                            <h3 class="counter"><span class="odometer" data-count="{{ $counter->counter_first }}">00</span>
                            </h3>
                            <span class="subtitle">{{ $counter->counter_first_desc }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Counter  -->

            <!-- Start Single Counter  -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--60 mt_md--30 mt_sm--30 mt_mobile--60">
                <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                    <div class="top-circle-shape"></div>
                    <div class="inner">
                        <div class="rbt-round-icon">
                            <img src="{{ asset('frontend/assets/images/icons/counter-02.png') }}" alt="Icons Images">
                        </div>
                        <div class="content">
                            <h3 class="counter"><span class="odometer" data-count="{{ $counter->counter_second }}">00</span>
                            </h3>
                            <span class="subtitle">{{ $counter->counter_second_desc }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Counter  -->

            <!-- Start Single Counter  -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_md--60 mt_sm--60">
                <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                    <div class="top-circle-shape"></div>
                    <div class="inner">
                        <div class="rbt-round-icon">
                            <img src="{{ asset('frontend/assets/images/icons/counter-03.png') }}" alt="Icons Images">
                        </div>
                        <div class="content">
                            <h3 class="counter"><span class="odometer" data-count="{{ $counter->counter_third }}">00</span>
                            </h3>
                            <span class="subtitle">{{ $counter->counter_third_desc }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Counter  -->

            <!-- Start Single Counter  -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--60 mt_md--30 mt_sm--30 mt_mobile--60">
                <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                    <div class="top-circle-shape"></div>
                    <div class="inner">
                        <div class="rbt-round-icon">
                            <img src="{{ asset('frontend/assets/images/icons/counter-04.png') }}" alt="Icons Images">
                        </div>
                        <div class="content">
                            <h3 class="counter"><span class="odometer" data-count="{{ $counter->counter_fourth }}">00</span>
                            </h3>
                            <span class="subtitle">{{ $counter->counter_fourth_desc }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Counter  -->
        </div>
    </div>
</div>
