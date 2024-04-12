@extends('admin.admin_dashboard')
@section('admincontent')

    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Yönetici Profil Bilgileri</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Yönetici Profil Bilgileri</span></li>
                </ol>
            </div>
        </header>

        <div class="row">
            <div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">
                <section class="card">
                    <div class="card-body">
                        <div class="thumb-info mb-3">
                            <img src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/profile.png') }}"
                                class="rounded img-fluid" height="512" width="512" alt="user photo">
                            <div class="thumb-info-title">
                                <span class="thumb-info-inner">Kullanıcı Adı: {{ $profileData->name }}</span>
                                <span class="thumb-info-type">Statü: {{ $profileData->role }}</span>
                            </div>
                        </div>

                        <hr class="dotted short">

                        <h4>E-Posta</h4>
                        <span class="thumb-info-type">{{ $profileData->email }}</span>

                        <hr class="dotted short">

                        <div class="social-icons-list">
                            <a rel="tooltip" data-bs-placement="bottom" target="_blank" href="http://www.facebook.com"
                                data-original-title="Facebook"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
                            <a rel="tooltip" data-bs-placement="bottom" href="http://www.twitter.com"
                                data-original-title="Twitter"><i class="fab fa-twitter"></i><span>Twitter</span></a>
                            <a rel="tooltip" data-bs-placement="bottom" href="http://www.linkedin.com"
                                data-original-title="Linkedin"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a>
                        </div>

                    </div>
                </section>
            </div>
            <div class="col-lg-8 col-xl-8">
                <div class="tabs">
                    <ul class="nav nav-tabs tabs-primary">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-target="#edit" data-bs-toggle="tab">Profil</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-target="#parola" data-bs-toggle="tab">Parola</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="edit" class="tab-pane fade show active">
                            <form class="p-3" action="{{ route('admin.profile.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <h4 class="mb-3 font-weight-semibold text-dark">Kullanıcı Bilgileri</h4>
                                <div class="row row mb-4">
                                    <div class="form-group col">
                                        <label for="username">Kullanıcı Adı</label>
                                        <input class="form-control" name="username" type="text" id="username"
                                            value="{{ $profileData->username }}">
                                    </div>
                                </div>
                                <div class="row row mb-4">
                                    <div class="form-group col">
                                        <label for="name">Adı Soyadı</label>
                                        <input class="form-control" name="name" type="text" id="name"
                                            value="{{ $profileData->name }}">
                                    </div>
                                </div>
                                <div class="row row mb-4">
                                    <div class="form-group col">
                                        <label for="email">E-Posta</label>
                                        <input class="form-control" name="email" type="email" id="email"
                                            value="{{ $profileData->email }}">
                                    </div>
                                </div>
                                <div class="row row mb-4">
                                    <div class="form-group col">
                                        <label for="phone">Telefon</label>
                                        <input class="form-control" name="phone" type="text" id="phone"
                                            value="{{ $profileData->phone }}">
                                    </div>
                                </div>
                                <div class="row row mb-4">
                                    <div class="form-group col">
                                        <label for="address">Adres</label>
                                        <input class="form-control" name="address" type="text" id="address"
                                            value="{{ $profileData->address }}">
                                    </div>
                                </div>
                                <div class="row row mb-4">
                                    <div class="form-group col">
                                        <label for="photo">Profil Görseli (512x512)</label>
                                        <input class="form-control" type="file" name="photo" id="image">
                                    </div>
                                </div>
                                <div class="row row mb-4">
                                    <div class="form-group col">
                                        <img id="showImage"
                                            src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/profile.png') }}"
                                            class="rounded img-fluid" style="height: 64px; width: 64px" alt="user photo">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-end mt-3">
                                        <button type="submit" class="btn btn-primary modal-confirm">Kaydet</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div id="parola" class="tab-pane fade">
                            <form class="p-3" action="{{ route('admin.profile.password') }}" method="POST">
                                @csrf
                                <h4 class="mb-3 font-weight-semibold text-dark">Kullanıcı Parola</h4>
                                <div class="row row mb-4">
                                    <div class="form-group col">
                                        <label for="old_password">Mevcut Parola *</label>
                                        <input class="form-control @error('old_password') is-invalid @enderror"
                                            name="old_password" type="password" id="old_password">
                                    </div>
                                    @error('old_password')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row row mb-4">
                                    <div class="form-group col">
                                        <label for="new_password">Yeni Parola *</label>
                                        <input class="form-control @error('new_password') is-invalid @enderror"
                                            name="new_password" type="password" id="new_password">
                                    </div>
                                    @error('new_password')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row row mb-4">
                                    <div class="form-group col">
                                        <label for="new_password_confirmation">Yeni Parola Doğrula *</label>
                                        <input class="form-control" name="new_password_confirmation" type="password"
                                            id="new_password_confirmation">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-end mt-3">
                                        <button type="submit" class="btn btn-primary modal-confirm">Kaydet</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>

@endsection
