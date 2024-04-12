@extends('instructor.instructor_dashboard')
@section('instructorcontent')

<div class="col-lg-9">
    <!-- Start Enrole Course  -->
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
        <div class="content">
            <div class="section-title">
                <h4 class="rbt-title-style-3">Siparişler</h4>
            </div>

            <div class="rbt-dashboard-table table-responsive mobile-table-750">
                <table class="rbt-table table table-borderless">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kurs Adı</th>
                            <th>Sipariş No</th>
                            <th>Sipariş Tarihi</th>
                            <th>Sipariş Tutarı</th>
                            <th>Durum</th>
                            <th>PDF Indir</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($orderItem as $key => $item)

                        <tr>
                            <th>{{ $key+1 }}</th>
                            <td>{{ $item->course_title }}</td>
                            <td>{{ $item['payment']['invoice_no'] }}</td>
                            <td>{{ $item['payment']['order_date'] }}</td>
                            <td>{{ $item['payment']['total_amount'] }} TL</td>
                            <td>
                                @if ($item['payment']['status'] == 'bekliyor')
                                <span class="rbt-badge-5 bg-primary-opacity">Bekliyor</span>
                                @elseif ($item['payment']['status'] == 'tamamlandı')
                                <span class="rbt-badge-5 bg-color-success-opacity color-success">Tamamlandı</span>
                                @endif
                            </td>
                            <td>
                                <a class="rbt-btn btn-xs bg-primary-opacity radius-round"
                                href="{{ route('instructor.order.invoice',$item->payment->id) }}" title="pdf">
                                <i class="feather-file-text pl--0"></i></a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- End Enrole Course  -->
</div>


@endsection
