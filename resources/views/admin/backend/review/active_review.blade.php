@extends('admin.admin_dashboard')
@section('admincontent')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Kurs Yorumları</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Kurs Yorumları</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header d-flex justify-content-between">
                        <h2 class="card-title">Onaylanan Kurs Yorumları</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kurs Adı</th>
                                    <th>Kullanıcı Adı</th>
                                    <th>Yorum</th>
                                    <th>Değerlendirme</th>
                                    <th>Yorum Durumu</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($review as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item['course']['course_name'] }}</td>
                                        <td>{{ $item['user']['name'] }}</td>
                                        <td>{{ $item->comment }}</td>
                                        <td>
                                            <div class="stars-wrapper">
                                                @if ($item->rating == null)
                                                    <span><i class="far fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                @elseif ($item->rating == 1)
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                @elseif ($item->rating == 2)
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                @elseif ($item->rating == 3)
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                @elseif ($item->rating == 4)
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                @elseif ($item->rating == 5)
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                @endif
                                            </div>
                                        </td>

                                        <td>
                                            @if ($item->status == 1)
                                                <span class="ecommerce-status completed"><strong>AKTİF</strong></span>
                                            @else
                                                <span class="ecommerce-status canceled"><strong>PASİF</strong></span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="form-group row pb-2">
                                                <div class="col-lg-9">
                                                    <div class="switch switch-sm switch-primary">
                                                        <input class="review-switch" type="checkbox" name="review-switch"
                                                            data-plugin-ios-switch data-review-id="{{ $item->id }}"
                                                            {{ $item->status ? 'checked' : '' }} />
                                                    </div>
                                                </div>
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

    <script>
        $(document).ready(function() {
            $('.review-switch').on('change', function() {
                var reviewId = $(this).data('review-id');
                var isChecked = $(this).is(':checked');

                $.ajax({
                    url: "{{ route('update.review.status') }}",
                    method: "post",
                    data: {
                        review_id: reviewId,
                        is_checked: isChecked ? 1 : 0,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function() {}
                });
            });
        });
    </script>
@endsection
