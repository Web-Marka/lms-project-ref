@extends('admin.admin_dashboard')
@section('admincontent')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Raporlar</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Raporlar</span></li>
                    <li><span>Yıllık Rapor</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header d-flex justify-content-between">
                        <h2 class="card-title">Yıllık Rapor</h2>
                        <h3 class="card-title">Tarih: {{ $year }}</h3>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tarih</th>
                                    <th>Kullanıcı</th>
                                    <th>Email</th>
                                    <th>Sipariş No</th>
                                    <th>Tutar</th>
                                    <th>Ödeme Türü</th>
                                    <th>Durum</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payment as $key => $item)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->order_date }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->invoice_no }}</td>
                                    <td>{{ $item->total_amount }}</td>
                                    <td>{{ $item->payment_type }}</td>
                                    <td>
                                        @if ($item->status == 'bekliyor')
                                        <span class="ecommerce-status completed"><strong>Bekliyor</strong></span>
                                        @else
                                        <span class="ecommerce-status canceled"><strong>Tamamlandı</strong></span>
                                        @endif
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
    @endsection
