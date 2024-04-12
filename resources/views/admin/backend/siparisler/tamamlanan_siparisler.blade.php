@extends('admin.admin_dashboard')
@section('admincontent')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Siparişler</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Siparişler</span></li>
                    <li><span>Tamamlanan Siparişler</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Tamamlanan Siparişler</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kullanıcı Adı</th>
                                    <th>Sipariş Tarihi</th>
                                    <th>Sipariş No</th>
                                    <th>Ödeme Türü</th>
                                    <th>Satış Fiyatı</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payment as $key => $item)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->order_date }}</td>
                                    <td>{{ $item->invoice_no }}</td>
                                    <td>{{ $item->payment_type }}</td>
                                    <td>{{ $item->total_amount }} TL</td>
                                    <td>
                                        @if ($item->status == 'bekliyor')
                                        <span class="ecommerce-status completed"><strong>Bekliyor</strong></span>
                                        @else
                                        <span class="ecommerce-status canceled"><strong>Tamamlandı</strong></span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="">
                                            <a href="{{ route('admin.siparis.detay',$item->id) }}" type="button" class="mb-1 mt-1 me-1 btn btn-xs btn-info d-block">Detay</a>
                                        </div>
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
