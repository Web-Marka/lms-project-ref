@extends('frontend.master')
@section('home')

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

@endsection
