@extends('admin.admin_dashboard')
@section('admincontent')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Eğitmenler</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Eğitmen Yönetimi</span></li>
                    <li><span>Eğitmenler</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header d-flex justify-content-between">
                        <h2 class="card-title">Eğitmen Tablosu</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Eğitmen Adı</th>
                                    <th>Eğitmen Kullanıcı Adı</th>
                                    <th>Eğitmen Email</th>
                                    <th>Eğitmen Telefon</th>
                                    <th>Eğitmen Durumu</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allinstructor as $key => $item)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>

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
                                                    <input class="instructor-switch" type="checkbox" name="switch"
                                                    data-plugin-ios-switch data-user-id="{{ $item->id }}" {{ $item->status ? 'checked' : '' }}/>
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

        $(document).ready (function()
        {
            $('.instructor-switch').on('change', function(){
                var userId = $(this).data('user-id');
                var isChecked = $(this).is(':checked');

                $.ajax({
                    url: "{{ route ('update.user.status') }}",
                    method: "post",
                    data: {
                        user_id : userId,
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
