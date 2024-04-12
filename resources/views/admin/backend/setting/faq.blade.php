@extends('admin.admin_dashboard')
@section('admincontent')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Site Yönetimi</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Site Yönetimi</span></li>
                    <li><span>Sıkça Sorulan Sorular</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="card-title mb-0">Sıkça Sorulan Sorular</h2>
                            <div>
                                <a href="{{ route('faq.ekle') }}" type="button" class="mb-1 mt-1 me-1 btn btn-default">
                                    <i class="fas fa-folder-plus"></i> S.S.S. Ekle
                                </a>
                                <a href="{{ route('admin.faq.title') }}" type="button" class="mb-1 mt-1 me-1 btn btn-default">
                                    <i class="fas fa-folder-plus"></i> S.S.S. Sayfa Başlığı
                                </a>
                            </div>
                        </div>
                    </header>

                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>SSS Başlık</th>
                                    <th>SSS İçerik</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sss_content as $key => $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->faq_title }}</td>
                                        <td>{{ $item->faq_content }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('admin.edit.faq', $item->id) }}"
                                                class="mb-1 mt-1 me-1 btn btn-sm-info"><i class="fas fa-pen-to-square"></i>
                                            </a>
                                            <a href="{{ route('admin.delete.faq', $item->id) }}" id="faqDelete"
                                                class="mb-1 mt-1 me-1 btn btn-sm-danger"><i class="fas fa-trash-can"></i>
                                            </a>
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
            $(document).on('click', '#faqDelete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'İçerik Siliniyor!',
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
