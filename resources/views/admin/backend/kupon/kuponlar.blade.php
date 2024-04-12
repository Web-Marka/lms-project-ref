@extends('admin.admin_dashboard')
@section('admincontent')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Kuponlar</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Kupon</span></li>
                    <li><span>Kuponlar</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header d-flex justify-content-between">
                        <h2 class="card-title">Kuponlar Tablosu</h2>
                        <a href="{{ route('admin.kupon.ekle') }}" type="button" class="mb-1 mt-1 me-1 btn btn-default">
                            <i class="fas fa-folder-plus"></i> Kupon Ekle
                        </a>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kupon Adı</th>
                                    <th>Kupon İndirim %</th>
                                    <th>Kupon Geçerlilik</th>
                                    <th>Kupon Durumu</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kupon as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->kupon_adi }}</td>
                                        <td>{{ $item->kupon_indirim_tutari }}%</td>
                                        <td>{{ Carbon\Carbon::parse($item->kupon_gecerlilik)->locale('tr_TR')->isoFormat('dddd, DD MMMM YYYY') }}
                                        </td>
                                        <td>
                                            @if (Carbon\Carbon::parse($item->kupon_gecerlilik)->isAfter(Carbon\Carbon::now()))
                                                <span class="ecommerce-status completed"><strong>AKTİF</strong></span>
                                            @else
                                                <span class="ecommerce-status canceled"><strong>PASİF</strong></span>
                                            @endif
                                        </td>


                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('admin.edit.kupon', $item->id) }}"
                                                class="mb-1 mt-1 me-1 btn btn-sm-info"><i class="fas fa-pen-to-square"></i>
                                            </a>
                                            <a href="{{ route('admin.delete.kupon', $item->id) }}" id="kuponDelete"
                                                class="mb-1 mt-1 me-1 btn btn-sm-danger"><i
                                                    class="fas fa-trash-can"></i></a>
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
    <script>
        $(function() {
            $(document).on('click', '#kuponDelete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Kupon Siliniyor!',
                    text: "Emin Misiniz?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet',
                    cancelButtonText: 'İptal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                    }
                })

            });

        });
    </script>
@endsection
