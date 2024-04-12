@extends('admin.admin_dashboard')
@section('admincontent')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Kurslar</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Kurs</span></li>
                    <li><span>Kurslar</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header d-flex justify-content-between">
                        <h2 class="card-title">Kurslar Tablosu</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kurs Görsel</th>
                                    <th>Kurs Adı</th>
                                    <th>Eğitmen Adı</th>
                                    <th>Kategori Adı</th>
                                    <th>Satış Fiyatı</th>
                                    <th>Durumu</th>
                                    <th>İşlem</th>
                                    <th>Kurs Detayları</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course as $key => $item)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td> <img src="{{ asset($item->course_image) }}" alt="" style="width: 70px; height:40px;"> </td>
                                    <td>{{ $item->course_name }}</td>
                                    <td>{{ $item['user']['name'] }}</td>
                                    <td>{{ $item['category']['category_name'] }}</td>
                                    <td>{{ $item->selling_price }}</td>

                                    <td>
                                        @if ($item->status == 1)
                                        <span class="ecommerce-status completed"><strong>AKTİF</strong></span>
                                        @else
                                        <span class="ecommerce-status canceled"><strong>PASİF</strong></span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="form-group row pb-2 d-flex justify-content-center">
                                            <div class="col-lg-9 ">
                                                <div class="switch switch-sm switch-primary">
                                                    <input class="course-switch" type="checkbox" name="courseSwitch" data-plugin-ios-switch
                                                    data-course-id="{{ $item->id }}" {{ $item->status ? 'checked' : '' }}/>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.course.details',$item->id) }}" type="button" class="mb-1 mt-1 me-1 btn btn-xs btn-info">Detay</a>
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

        $(document).ready (function()
        {
            $('.course-switch').on('change', function(){
                var courseId = $(this).data('course-id');
                var isChecked = $(this).is(':checked');

                $.ajax({
                    url: "{{ route ('update.course.status') }}",
                    method: "post",
                    data: {
                        course_id : courseId,
                        is_checked: isChecked ? 1 : 0,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response){
                        toastr.success(response.message);
                    },
                    error: function(){
                    }
                });
            });
        });

    </script>
    @endsection
