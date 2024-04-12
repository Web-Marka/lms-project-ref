@extends('admin.admin_dashboard')
@section('admincontent')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Sipariş Detayı</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Siparişler</span></li>
                    <li><span>Sipariş Detayı</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col-md-6">
                <section class="card card-featured card-featured-success mb-4">
                    <header class="card-header">
                        <h2 class="card-title">Kullanıcı Bilgileri</h2>
                    </header>
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-4">
                                <h5 class=""><strong>Adı Soyadı</strong></h5>
                            </div>
                            <div class="col-6 col-md-8 mt-2 text-dark">
                                <span>: {{ $payment->name }}</span>
                            </div>
                        </div>
                        <hr class="my-2 border-top border-1 border-dark">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-4">
                                <h5 class=""><strong>Email</strong></h5>
                            </div>
                            <div class="col-6 col-md-8 mt-2 text-dark">
                                <span>: {{ $payment->email }}</span>
                            </div>
                        </div>
                        <hr class="my-2 border-top border-1 border-dark">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-4">
                                <h5 class=""><strong>Telefon</strong></h5>
                            </div>
                            <div class="col-6 col-md-8 mt-2 text-dark">
                                <span>: {{ $payment->phone }}</span>
                            </div>
                        </div>
                        <hr class="my-2 border-top border-1 border-dark">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-4">
                                <h5 class=""><strong>Adres</strong></h5>
                            </div>
                            <div class="col-6 col-md-8 mt-2 text-dark">
                                <span>: {{ $payment->address }}</span>
                            </div>
                        </div>
                        <hr class="my-2 border-top border-1 border-dark">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-4">
                                <h5 class=""><strong>İl</strong></h5>
                            </div>
                            <div class="col-6 col-md-8 mt-2 text-dark">
                                <span>: {{ $payment->city }}</span>
                            </div>
                        </div>
                        <hr class="my-2 border-top border-1 border-dark">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-4">
                                <h5 class=""><strong>İlçe</strong></h5>
                            </div>
                            <div class="col-6 col-md-8 mt-2 text-dark">
                                <span>: {{ $payment->town }}</span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-md-6">
                <section class="card card-featured card-featured-success mb-4">
                    <header class="card-header">
                        <h2 class="card-title">Sipariş Bilgileri</h2>
                    </header>
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-4">
                                <h5 class=""><strong>Sipariş No</strong></h5>
                            </div>
                            <div class="col-6 col-md-8 mt-2 text-dark">
                                <span>: {{ $payment->invoice_no }}</span>
                            </div>
                        </div>
                        <hr class="my-2 border-top border-1 border-dark">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-4">
                                <h5 class=""><strong>Sipariş Tarihi</strong></h5>
                            </div>
                            <div class="col-6 col-md-8 mt-2 text-dark">
                                <span>: {{ $payment->order_date }}</span>
                            </div>
                        </div>
                        <hr class="my-2 border-top border-1 border-dark">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-4">
                                <h5 class=""><strong>Ödeme Yöntemi</strong></h5>
                            </div>
                            <div class="col-6 col-md-8 mt-2 text-dark">
                                <span>: {{ $payment->cash_delivery }} - {{ $payment->payment_type }}</span>
                            </div>
                        </div>
                        <hr class="my-2 border-top border-1 border-dark">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-4">
                                <h5 class=""><strong>Sipariş Tutarı</strong></h5>
                            </div>
                            <div class="col-6 col-md-8 mt-2 text-dark">
                                <span>: {{ $payment->total_amount }} TL</span>
                            </div>
                        </div>
                        <hr class="my-2 border-top border-1 border-dark">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-4">
                                <h5 class=""><strong>Sipariş Durumu</strong></h5>
                            </div>
                            <div class="col-6 col-md-8 mt-2 text-dark">
                                @if ($payment->status == 'bekliyor')
                                <span class="ecommerce-status completed"><strong>Bekliyor</strong></span>
                                @else
                                <span class="ecommerce-status canceled"><strong>Tamamlandı</strong></span>
                                @endif
                            </div>
                        </div>
                        <hr class="my-2 border-top border-1 border-dark">
                        <div class="row">
                            @if ($payment->status == 'bekliyor')
                            <a href="{{ route('siparis-onayla',$payment->id) }}" id="siparisOnay" class="mb-1 mt-1 me-2 btn btn-primary btn-sm btn-block">Siparişi Onayla</a>
                            @elseif ($payment->status == 'tamamlandı')
                            <button class="mb-1 mt-1 me-2 btn btn-success btn-sm btn-block" disabled>Sipariş Tamamlandı</button>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Kurs Bilgileri</h2>
                </header>
                <div class="card-body">
                    <table class="table table-responsive-md table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Kurs Görseli</th>
                                <th>Kurs Adı</th>
                                <th>Kategori</th>
                                <th>Eğitmen</th>
                                <th>Fiyat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItem as $item)
                            <tr>
                                <td><img src="{{ asset($item->course->course_image) }}" style="width: 116px; height: 80px;"></td>
                                <td>{{ $item->course->course_name }}</td>
                                <td>{{ $item->course->category->category_name }}</td>
                                <td>{{ $item->instructor->name }}</td>
                                <td>{{ $item->price }} TL</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </section>
        </div>
</section>
@endsection
