@extends('instructor.instructor_dashboard')
@section('instructorcontent')
    <div class="col-lg-9">
        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
            <div class="content">

                <div class="section-title">
                    <h4 class="rbt-title-style-3">Ayarlar</h4>
                </div>

                <div class="advance-tab-button mb--30">
                    <ul class="nav nav-tabs tab-button-style-2 justify-content-start" id="settinsTab-4" role="tablist">
                        <li role="presentation">
                            <a href="#" class="tab-button active" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile" role="tab" aria-controls="profile" aria-selected="true">
                                <span class="title">Profile</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#" class="tab-button" id="password-tab" data-bs-toggle="tab"
                                data-bs-target="#password" role="tab" aria-controls="password" aria-selected="false">
                                <span class="title">Şifre</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#" class="tab-button" id="social-tab" data-bs-toggle="tab"
                                data-bs-target="#social" role="tab" aria-controls="social" aria-selected="false">
                                <span class="title">Sosyal Medya</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="{{ route('instructor.profile.store') }}" method="POST" enctype="multipart/form-data"
                            class="rbt-profile-row rbt-default-form row row--15">
                            @csrf
                            <div class="rbt-dashboard-content-wrapper">
                                <img id="showBannerImage1"
                                    src="{{ !empty($profileData->profile_banner) ? url('upload/instructor_images/' . $profileData->profile_banner) : url('upload/banner.jpg') }}"
                                    class="tutor-bg-photo bg_image height-245" alt="instructor photo">
                                <div class="rbt-tutor-information">
                                    <div class="rbt-tutor-information-left">
                                        <div class="thumbnail rbt-avatars size-lg position-relative">
                                            <img id="showImage1"
                                                src="{{ !empty($profileData->photo) ? url('upload/instructor_images/' . $profileData->photo) : url('upload/profile.png') }}"
                                                alt="instructor photo">

                                            <div class="rbt-edit-photo-inner"
                                                style="width: 40px; height: 40px; border-radius: 50%; overflow: hidden; background-color: #ccc;">
                                                <input type="file" name="photo" id="imageInput"
                                                    style="display: none;" />
                                                <label for="imageInput" class="rbt-edit-photo"
                                                    style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100%; cursor: pointer;">
                                                    <i class="feather-camera" style="font-size: 28px; color: blue;"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rbt-tutor-information-right">
                                        <div class="tutor-btn">
                                            <input type="file" name="profile_banner" id="imageBannerInput"
                                                style="display: none;" />
                                            <label for="imageBannerInput"
                                                class="rbt-btn btn-sm btn-border color-white radius-round-10"
                                                style="cursor: pointer;">Banner Görsel Yükle</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="rbt-form-group">
                                    <label for="username">Kullanıcı Adı</label>
                                    <input id="username" name="username" type="text"
                                        value="{{ $profileData->username }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="rbt-form-group">
                                    <label for="name">Adı Soyadı</label>
                                    <input id="name" name="name" type="text" value="{{ $profileData->name }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="rbt-form-group">
                                    <label for="email">E-Posta</label>
                                    <input id="email" name="email" type="email" value="{{ $profileData->email }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="rbt-form-group">
                                    <label for="phone">Telefon</label>
                                    <input id="phone" name="phone" type="tel"
                                        value="{{ $profileData->phone }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                <div class="rbt-form-group">
                                    <label for="address">Adres</label>
                                    <input id="address" name="address" type="text"
                                        value="{{ $profileData->address }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="rbt-form-group">
                                    <label for="city">İl</label>
                                    <input id="city" name="city" type="text" value="{{ $profileData->city }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="rbt-form-group">
                                    <label for="town">İlçe</label>
                                    <input id="town" name="town" type="text" value="{{ $profileData->town }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                <div class="rbt-form-group">
                                    <label for="instructor_bio">Eğitmen Hakkında</label>
                                    <textarea id="instructor_bio" name="instructor_bio" type="text">{{ $profileData->instructor_bio }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 mt--20">
                                <div class="rbt-form-group">
                                    <button class="rbt-btn btn-gradient"
                                        type="submit"> Bilgileri Kaydet
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <form action="{{ route('instructor.profile.password') }}" method="POST"
                            class="rbt-profile-row rbt-default-form row row--15">
                            @csrf
                            <div class="col-12">
                                <div class="rbt-form-group">
                                    <label for="old_password">Mevcut Parola *</label>
                                    <input class="form-control @error('old_password') is-invalid @enderror"
                                        name="old_password" type="password" id="old_password">
                                </div>
                                @error('old_password')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="rbt-form-group">
                                    <label for="new_password">Yeni Şifre *</label>
                                    <input class="form-control @error('new_password') is-invalid @enderror"
                                        name="new_password" type="password" id="new_password">
                                </div>
                                @error('new_password')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="rbt-form-group">
                                    <label for="new_password_confirmation">Yeni Şifre Doğrula *</label>
                                    <input class="form-control" name="new_password_confirmation" type="password"
                                        id="new_password_confirmation">
                                </div>
                            </div>

                            <div class="col-12 mt--20">
                                <div class="rbt-form-group">
                                    <button class="rbt-btn btn-gradient"
                                        type="submit"> Bilgileri Kaydet</button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                        <form action="{{ route('instructor.profile.social') }}" method="POST" class="rbt-profile-row rbt-default-form row row--15">
                            @csrf
                            <div class="col-12">
                                <div class="rbt-form-group">
                                    <label for="facebook"><i class="feather-facebook"></i> Facebook</label>
                                    <input id="facebook" name="facebook" type="text" placeholder="https://facebook.com/"
                                    value="{{ $profileData->facebook }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rbt-form-group">
                                    <label for="twitter"><i class="feather-twitter"></i> Twitter</label>
                                    <input id="twitter" name="twitter" type="text" placeholder="https://twitter.com/"
                                    value="{{ $profileData->twitter }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rbt-form-group">
                                    <label for="linkedin"><i class="feather-linkedin"></i> Linkedin</label>
                                    <input id="linkedin" name="linkedin" type="text" placeholder="https://linkedin.com/"
                                    value="{{ $profileData->linkedin }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rbt-form-group">
                                    <label for="instagram"><i class="feather-instagram"></i> Instagram</label>
                                    <input id="instagram" name="instagram" type="text" placeholder="https://instagram.com/"
                                    value="{{ $profileData->instagram }}">
                                </div>
                            </div>
                            <div class="col-12 mt--10">
                                <div class="rbt-form-group">
                                    <button class="rbt-btn btn-gradient" type="submit">Bilgileri Kaydet</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            // 2. input elemanının change olayını dinleyin
            $('#imageInput').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage1, #showImage2').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });

        $(document).ready(function() {
            // 2. input elemanının change olayını dinleyin
            $('#imageBannerInput').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showBannerImage1, #showBannerImage2').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
