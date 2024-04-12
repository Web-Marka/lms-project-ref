@extends('frontend.master')
@section('home')

    <div class="rbt-elements-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row gy-5 row--30">
                <div class="col-lg-12">
                    <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <div class="row">
                            <div class="col-lg-6 pt--50">
                                <img class="d-flex justify-items-end" src="{{ asset('frontend/assets/images/kayit.png') }}">
                                <hr class="rbt-separator mt--50 mb--50">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input name="email" id="email" type="email" />
                                        <label for="email">E-mail *</label>
                                        <span class="focus-border"></span>
                                    </div>

                                    <div class="form-group">
                                        <input name="name" id="name" type="text">
                                        <label for="name">Kullanıcı Adı *</label>
                                        <span class="focus-border"></span>
                                    </div>

                                    <div class="form-group">
                                        <input name="password" id="password" type="password">
                                        <label for="password">Şifre *</label>
                                        <span class="focus-border"></span>
                                    </div>

                                    <div class="form-group">
                                        <input name="password_confirmation" id="password_confirmation" type="password">
                                        <label for="password_confirmation">Şifre Tekrar *</label>
                                        <span class="focus-border"></span>
                                    </div>

                                    <div class="form-submit-group">
                                        <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                            <span class="icon-reverse-wrapper">
                                                <span class="btn-text">Kayıt Ol</span>
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
@endsection
