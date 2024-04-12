<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login & Register - Online Courses & Education Bootstrap5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/magnigy-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/toastr.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="rbt-header-sticky">

    @include('instructor.include.instructor_header')
    @include('instructor.include.instructor_mobile_menu')
    @include('instructor.include.instructor_sidebar')
    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">Eğitmen Giriş</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="index.html">Anasayfa</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Eğitmen Giriş</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-elements-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row gy-5 row--30">
                <div class="col-lg-12">
                    <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <div class="row">
                            <div class="col-lg-6 pt--50">
                                <img class="d-flex justify-items-end" src="{{ asset('frontend/assets/images/giris.png') }}">
                                <hr class="rbt-separator mt--50 mb--50">
                                <form class="max-width-auto mr--50" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input name="email" id="email" type="email"
                                        class="@error('email') is-invalid @enderror"/>
                                        <label for="email">Kullanıcı Adı veya Email *</label>
                                        <span class="focus-border"></span>
                                        @error('email')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input name="password" id="password" type="password"
                                        class="@error('password') is-invalid @enderror" />
                                        <label for="password">Şifre *</label>
                                        <span class="focus-border"></span>
                                        @error('password')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row mb--30">
                                        <div class="col-lg-6">
                                            <div class="rbt-checkbox">
                                                <input type="checkbox" id="rememberme" name="rememberme">
                                                <label for="rememberme">Beni Hatırla</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="rbt-lost-password text-end">
                                                <a class="rbt-btn-link" href="#">Şifrenizi mi unuttunuz?</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-submit-group">
                                        <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                            <span class="icon-reverse-wrapper">
                                                <span class="btn-text">Giriş</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <img src="{{ asset('frontend/assets/images/login.jpg') }}" class="rbt-contact-form">
                            </div>
                        </div>
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

    <div class="rbt-progress-parent">
        <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
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
    <script src="{{ asset('frontend/assets/js/vendor/jquery.js') }}"></script>
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
    <script src="{{ asset('frontend/assets/js/vendor/waypoint.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/easypie.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/text-type.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-one-page-nav.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/magnify-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/paralax-scroll.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/paralax.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/countdown.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/plyr.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
</body>

</html>
