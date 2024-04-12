<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Instructor Dashboard - WebMarka LMS Tema</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/euclid-circulara.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/magnify.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/magnigy-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/toastr.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.tiny.cloud/1/e1e44wxvwhjiqnmjm4a4jm6cm7a3urtwmi1ise068fmp4d1x/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#requirements', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'powerpaste advcode table lists checklist',
            toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
        });
        tinymce.init({
            selector: 'textarea#course_description', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'powerpaste advcode table lists checklist',
            toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
        });
        tinymce.init({
            selector: 'textarea#course_content', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'powerpaste advcode table lists checklist',
            toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
        });
    </script>
</head>

<body>
    @include('instructor.include.instructor_header')
    @include('instructor.include.instructor_mobile_menu')
    @include('instructor.include.instructor_sidebar')
    <a class="close_side_menu" href="javascript:void(0);"></a>

    <main class="rbt-main-wrapper">


        <div class="rbt-page-banner-wrapper">
            <div class="rbt-banner-image"></div>
        </div>
        <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="rbt-dashboard-content-wrapper">
                            @php
                                $id = Auth::user()->id;
                                $profileData = App\Models\User::find($id);
                            @endphp
                            <img id="showBannerImage2"
                                src="{{ !empty($profileData->profile_banner) ? url('upload/instructor_images/' . $profileData->profile_banner) : url('upload/banner.jpg') }}"
                                class="tutor-bg-photo bg_image height-350" alt="instructor photo">
                            <div class="rbt-tutor-information">
                                <div class="rbt-tutor-information-left">
                                    <div class="thumbnail rbt-avatars size-lg">
                                        <img id="showImage2"
                                            src="{{ !empty($profileData->photo) ? url('upload/instructor_images/' . $profileData->photo) : url('upload/profile.png') }}"
                                            alt="Instructor">
                                    </div>
                                    <div class="tutor-content">
                                        <h5 class="title">{{ $profileData->name }}</h5>
                                        <div class="rbt-review">
                                            <h5 class="title">{{ $profileData->email }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="rbt-tutor-information-right">
                                    <div class="tutor-btn">
                                        <a class="rbt-btn btn-md hover-icon-reverse" href="{{ route('add.course') }}">
                                            <span class="icon-reverse-wrapper">
                                                <span class="btn-text">Yeni Kurs Oluştur</span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-5">
                            @include('instructor.include.instructor_dashboard_menu')

                            @yield('instructorcontent')
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
        @include('instructor.include.instructor_footer')

    </main>

    <div class="rbt-progress-parent">
        <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    <script src="{{ asset('frontend/assets/js/vendor/modernizr.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/sal.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/swiper.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/magnify.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-appear.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/odometer.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/backtotop.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/isotop.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/imageloaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/waypoint.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/easypie.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/text-type.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-one-page-nav.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/magnify-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/paralax-scroll.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/paralax.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/countdown.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/plyr.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/validate.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @include('frontend.include.js')
</body>

</html>
