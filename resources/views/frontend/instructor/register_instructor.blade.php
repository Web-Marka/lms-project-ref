@extends('frontend.master')
@section('home')

<div class="rbt-become-area bg-color-white rbt-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <span class="subtitle bg-pink-opacity">Eğitmen</span>
                    <h2 class="title">Eğitmen Başvuru</h2>
                    <p class="description has-medium-font-size mt--20 mb--40">Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>
        </div>

        <div class="row row row--30">

            <div class="col-lg-12 mt_md--40 mt_sm--40 order-2 order-lg-1">
                <div class="advance-tab-button">
                    <ul class="nav nav-tabs tab-button-style-2" id="myTab-4" role="tablist">
                        <li role="presentation">
                            <a href="#" class="tab-button" id="home-tab-4" data-bs-toggle="tab" data-bs-target="#home-4" role="tab" aria-controls="home-4" aria-selected="false">
                                <span class="title">Become an Intructor.</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#" class="tab-button active" id="profile-tab-4" data-bs-toggle="tab" data-bs-target="#profile-4" role="tab" aria-controls="profile-4" aria-selected="true">
                                <span class="title">Intructor Rules.</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#" class="tab-button" id="contact-tab-4" data-bs-toggle="tab" data-bs-target="#contact-4" role="tab" aria-controls="contact-4" aria-selected="false">
                                <span class="title">Start with courses.</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content advance-tab-content-style-2">
                    <div class="tab-pane fade" id="home-4" role="tabpanel" aria-labelledby="home-tab-4">
                        <div class="content">
                            <p>Educational technology ipsum dolor sit amet consectetur, adipisicing elit. Tempora sequi doloremque dicta quia unde odio nam minus reiciendis ullam aliquam, dolorum ab quisquam cum numquam nemo iure cumque iste. Accusamus necessitatibus.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade active show" id="profile-4" role="tabpanel" aria-labelledby="profile-tab-4">
                        <div class="content">
                            <p>Physical education ipsum dolor sit amet consectetur, adipisicing elit. Tempora sequi doloremque dicta quia unde odio nam minus reiciendis ullam aliquam, dolorum ab quisquam cum numquam nemo iure cumque iste. Accusamus necessitatibus.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact-4" role="tabpanel" aria-labelledby="contact-tab-4">
                        <div class="content">
                            <p>Experiencing music ipsum dolor sit amet consectetur, adipisicing elit. Tempora sequi doloremque dicta quia unde odio nam minus reiciendis ullam aliquam, dolorum ab quisquam cum numquam nemo iure cumque iste. Accusamus necessitatibus.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row pt--60 g-5">
            <div class="col-lg-4">
                <div class="thumbnail">
                    <img class="radius-10 w-100" src="{{ asset('upload/egitmen-giris.jpg') }}" alt="Corporate Template">
                </div>
            </div>

            <div class="col-lg-8">
                <div class="rbt-contact-form contact-form-style-2 ml--10">
                    <div class="section-title text-center">
                        <span class="subtitle bg-primary-opacity">Eğitmen Olun</span>
                    </div>
                    <h3 class="title text-center mb--30">Eğitmen Kayıt Formu</h3>
                    <hr class="mb--30">

                    <form action="{{ route ('instructor.register') }}" method="POST" class="row row--15">
                        @csrf
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="@error('name') is-invalid @enderror" id="name" name="name" type="text">
                                <label for="name">Adınız ve Soyadınız</label>
                                <span class="focus-border"></span>
                                @error('name')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="@error('username') is-invalid @enderror" id="username" name="username" type="text">
                                <label for="username">Kullanıcı Adı</label>
                                <span class="focus-border"></span>
                                @error('username')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="@error('email') is-invalid @enderror" id="email" name="email" type="email">
                                <label for="email">Email Adresiniz</label>
                                <span class="focus-border"></span>
                                @error('email')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="@error('phone') is-invalid @enderror" id="phone" name="phone" type="tel"
                                data-plugin-masked-input="" data-input-mask="(999) 999-99-99" placeholder="(555) 555-55-00">
                                <label for="phone">Telefon</label>
                                <span class="focus-border"></span>
                                @error('phone')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <input class="@error('address') is-invalid @enderror" id="address" name="address" type="text">
                                <label for="address">Adresiniz</label>
                                <span class="focus-border"></span>
                                @error('address')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="@error('city') is-invalid @enderror" id="city" name="city" type="text">
                                <label for="city">İl</label>
                                <span class="focus-border"></span>
                                @error('city')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="@error('town') is-invalid @enderror" id="town" name="town" type="text">
                                <label for="town">İlçe</label>
                                <span class="focus-border"></span>
                                @error('town')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea class="@error('instructor_bio') is-invalid @enderror" id="instructor_bio" name="instructor_bio" type="text"></textarea>
                                <label for="instructor_bio">Kısaca Kendinizi Tanıtın</label>
                                <span class="focus-border"></span>
                                @error('instructor_bio')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="form-group">
                                <input class="@error('password') is-invalid @enderror" id="password" name="password" type="password">
                                <label for="password">Şifre</label>
                                <span class="focus-border"></span>
                                @error('password')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-submit-group">
                                <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Gönder</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
  $("#phone").mask("(999) 999-99-99");
});
</script>

@endsection
