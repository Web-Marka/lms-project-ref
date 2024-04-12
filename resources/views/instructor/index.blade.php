@extends('instructor.instructor_dashboard')
@section('instructorcontent')
    @php
        $id = Auth::user()->id;
        $instructorId = App\Models\User::find($id);
        $status = $instructorId->status;
    @endphp

    <div class="col-lg-9">
        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
            <div class="content">
                <div class="section-title">
                    <h4 class="rbt-title-style-3">Eğitmen Kontrol Paneli</h4>
                </div>

                @if ($status === '1')
                    <div class="rbt-callto-action rbt-cta-default style-2 mb--30">
                        <div class="content-wrapper overflow-hidden pt--30 pb--30 bg-color-primary-opacity">
                            <div class="row gy-5 align-items-end">
                                <div class="col-lg-8">
                                    <div class="inner">
                                        <div class="content text-left">
                                            <h5 class="mb--5">Eğitmen Hesabı<span class="text-success"> Aktif</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="rbt-callto-action rbt-cta-default style-2 mb--30">
                        <div class="content-wrapper overflow-hidden pt--30 pb--30 bg-color-primary-opacity">
                            <div class="row gy-5 align-items-end">
                                <div class="col-lg-8">
                                    <div class="inner">
                                        <div class="content text-left">
                                            <h5 class="mb--5">Eğitmen Hesabı<span class="text-danger"> Pasif</span></h5>
                                            <p class="b3">Hesabınız Yönetici Kontrolü Sonrası Aktif Edilecektir.<br>
                                                Anlayışınız İçin Teşekkür Ederiz.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

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
                                                    @if(!empty($instructorId->created_at))
                                                        {{ $instructorId->created_at }}
                                                    @else
                                                        {{ $instructorId->updated_at }}
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
                                                <div class="rbt-profile-content b2">: {{ $instructorId->name }}</div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->

                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2"><strong>Kullanıcı Adı</strong></div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2">: {{ $instructorId->username }}</div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->

                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2"><strong>E-Posta</strong></div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2">: {{ $instructorId->email }}</div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->

                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2"><strong>Telefon</strong></div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2">: {{ $instructorId->phone }}</div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->

                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2" style="white-space: nowrap;"><strong>Adres</strong></div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2">: {{ $instructorId->address }} {{ $instructorId->town }}/{{ $instructorId->city }}</div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->

                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2" style="white-space: nowrap;"><strong>Eğitmen Hakkında</strong></div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2">
                                                    : {{ $instructorId->instructor_bio }}
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
    </div>
    </div>
@endsection
