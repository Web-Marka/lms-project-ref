@extends('frontend.dashboard.user_dashboard')
@section('userdashboard')
    @php
        $id = Auth::user()->id;
        $userId = App\Models\User::find($id);
    @endphp
    <div class="col-lg-9">
        <!-- Start Instructor Profile  -->
        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
            <div class="content">
                <div class="section-title">
                    <h4 class="rbt-title-style-3">Kullanıcı Bilgileri</h4>
                </div>
                <div class="rbt-callto-action rbt-cta-default style-2 mb--30">
                    <div class="content-wrapper overflow-hidden pt--30 pb--30 bg-color-primary-opacity">
                        <div class="row gy-5 align-items-end">
                            <div class="col-lg-8">
                                <div class="inner">
                                    <div class="content text-left">
                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2"><strong>Kayıt Tarihi</strong></div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2">:
                                                    @if (!empty($userId->created_at))
                                                        {{ $userId->created_at }}
                                                    @else
                                                        {{ $userId->updated_at }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->

                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2"><strong>Ad ve Soyad</strong></div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2">: {{ $userId->name }}</div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->

                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2"><strong>Kullanıcı Adı</strong></div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2">: {{ $userId->username }}</div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->

                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2"><strong>E-Posta</strong></div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2">: {{ $userId->email }}</div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->

                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2"><strong>Telefon</strong></div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2" style="white-space: nowrap;">:
                                                    @if(empty($userId->phone))
                                                        <strong style="color: red;">Lütfen Ayarlar Sekmesinden Telefon Bilgilerinizi Güncelleyiniz.</strong>
                                                    @else
                                                        {{ $userId->phone }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->

                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2"><strong>Adres</strong></div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2" style="white-space: nowrap;">:
                                                    @if(empty($userId->address))
                                                        <strong style="color: red;">Lütfen Ayarlar Sekmesinden Adres Bilgilerinizi Güncelleyiniz.</strong>
                                                    @else
                                                        {{ $userId->address }}. {{ $userId->town }}/{{ $userId->city }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Instructor Profile  -->

    </div>
@endsection
