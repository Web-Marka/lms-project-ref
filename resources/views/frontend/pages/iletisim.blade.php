<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home - Online Courses & Education Bootstrap5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
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
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/toastr.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="rbt-header-sticky">
    @include('frontend.include.frontend_header')
    @include('frontend.include.frontend_mobil_menu')
    @include('frontend.include.frontend_shopping')
    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-conatct-area bg-gradient-11 rbt-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb--60">
                        <span class="subtitle bg-secondary-opacity">İletişim</span>
                        <h2 class="title">LMS Eğitim Sistemleri <br> Bize Katılın.</h2>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="150"
                    data-sal-duration="800">
                    <div class="rbt-address">
                        <div class="icon">
                            <i class="feather-headphones"></i>
                        </div>
                        <div class="inner">
                            <h4 class="title">İletişim Numaramız</h4>
                            <p><a href="tel:{{ $iletisim->telefon }}">{{ $iletisim->telefon }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="200"
                    data-sal-duration="800">
                    <div class="rbt-address">
                        <div class="icon">
                            <i class="feather-mail"></i>
                        </div>
                        <div class="inner">
                            <h4 class="title">E-Posta</h4>
                            <p><a href="mailto:{{ $iletisim->email }}">{{ $iletisim->email }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="250"
                    data-sal-duration="800">
                    <div class="rbt-address">
                        <div class="icon">
                            <i class="feather-map-pin"></i>
                        </div>
                        <div class="inner">
                            <h4 class="title">Adres</h4>
                            <p>{{ $iletisim->adres }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-google-map bg-color-white">
        <iframe class="w-100"
            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2965.0824050173574!2d-93.63905729999999!3d41.998507000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sWebFilings%2C+University+Boulevard%2C+Ames%2C+IA!5e0!3m2!1sen!2sus!4v1390839289319"
            height="600" style="border:0"></iframe>
    </div>

    @include('frontend.include.frontend_footer')

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
    <script src="{{ asset('frontend/assets/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
    @include('frontend.include.js')
</body>

</html>
