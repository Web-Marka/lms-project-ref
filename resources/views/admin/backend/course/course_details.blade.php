@extends('admin.admin_dashboard')
@section('admincontent')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Kurs Detayı</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Kurslar</span></li>
                    <li><span>Kurs Detayı</span></li>
                </ol>
            </div>
        </header>
        <div class="col-md-12">
            <section class="card card-featured card-featured-dark mb-4">
                <header class="card-header">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ asset($coursedetails->course_image) }}" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title">Kurs Bilgileri</h2>
                                <hr class="my-3 border-top border-2 border-dark">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text"><strong>Kurs Adı: </strong></span>
                                            <div class="text-center">
                                                <span>{{ $coursedetails->course_name }}</span>
                                            </div>
                                        </div>
                                        <hr class="my-2 border-top border-1 border-dark">
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text"><strong>Kategori Adı: </strong></span>
                                            <div class="text-center">
                                                <span>{{ $coursedetails['category']['category_name'] }}</span>
                                            </div>
                                        </div>
                                        <hr class="my-2 border-top border-1 border-dark">
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text"><strong>Alt Kategori Adı: </strong></span>
                                            <div class="text-center">
                                                <span>{{ $coursedetails['subcategory']['subcategory_name'] }}</span>
                                            </div>
                                        </div>
                                        <hr class="my-2 border-top border-1 border-dark">
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text"><strong>Eğitmen Adı: </strong></span>
                                            <div class="text-center">
                                                <span>{{ $coursedetails['user']['name'] }}</span>
                                            </div>
                                        </div>
                                        <hr class="my-2 border-top border-1 border-dark">
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text"><strong>Tanıtım Link: </strong></span>
                                            <div class="text-center">
                                                <span>{{ $coursedetails->video }}</span>
                                            </div>
                                        </div>
                                        <hr class="my-2 border-top border-1 border-dark">
                                    </div>

                                    {{--  --}}

                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text"><strong>Kurs Süresi: </strong></span>
                                            <div class="text-center">
                                                <span>{{ $coursedetails->duration }}</span>
                                            </div>
                                        </div>
                                        <hr class="my-2 border-top border-1 border-dark">
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text"><strong>Kurs Dili: </strong></span>
                                            <div class="text-center">
                                                <span>{{ $coursedetails->language }}</span>
                                            </div>
                                        </div>
                                        <hr class="my-2 border-top border-1 border-dark">
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text"><strong>Sertifika: </strong></span>
                                            <div class="text-center">
                                                <span>{{ $coursedetails->certificate }}</span>
                                            </div>
                                        </div>
                                        <hr class="my-2 border-top border-1 border-dark">
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text"><strong>Satış Fiyatı: </strong></span>
                                            <div class="text-center">
                                                <span>{{ $coursedetails->selling_price }} TL</span>
                                            </div>
                                        </div>
                                        <hr class="my-2 border-top border-1 border-dark">
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text"><strong>İndirimli Fiyat: </strong></span>
                                            <div class="text-center">
                                                <span>{{ $coursedetails->discount_price }} TL</span>
                                            </div>
                                        </div>
                                        <hr class="my-2 border-top border-1 border-dark">
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text"><strong>Durum: </strong></span>
                                            <div class="text-center">
                                                @if ($coursedetails->status == 1)
                                                <span class="ecommerce-status completed"><strong>AKTİF</strong></span>
                                                @else
                                                <span class="ecommerce-status canceled"><strong>PASİF</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                        <hr class="my-2 border-top border-1 border-dark">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            </section>
        </div>

    @endsection
