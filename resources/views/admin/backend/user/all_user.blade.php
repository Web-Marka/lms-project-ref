@extends('admin.admin_dashboard')
@section('admincontent')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Kullanıcı Yönetimi</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Kullanıcı Yönetimi</span></li>
                    <li><span>Kullanıcılar</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header d-flex justify-content-between">
                        <h2 class="card-title">Kullanıcı Tablosu</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kullanıcı Profil Görseli</th>
                                    <th>Kullanıcı Adı</th>
                                    <th>Kullanıcı Kullanıcı Adı</th>
                                    <th>Kullanıcı Email</th>
                                    <th>Kullanıcı Telefon</th>
                                    <th>Kullanıcı Durumu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ !empty($item->photo) ? url('upload/user_images/' . $item->photo) : url('upload/profile.png') }}"
                                                style="width: 50px; height: 45px;"></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>

                                        <td>
                                            @if ($item->UserOnline())
                                            <span class="ecommerce-status completed"><strong>Online</strong></span>
                                            @else
                                            <span class="ecommerce-status canceled"><strong>{{ Carbon\Carbon::parse($item->last_log)->diffForHumans() }}</strong></span>
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
