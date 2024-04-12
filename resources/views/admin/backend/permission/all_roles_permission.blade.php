@extends('admin.admin_dashboard')
@section('admincontent')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Roller & İzinler</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Roller & İzinler</span></li>
                    <li><span>İzinler</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header d-flex justify-content-between">
                        <h2 class="card-title">İzinler</h2>
                        <a href="{{ route ('add.roles.permission') }}" type="button" class="mb-1 mt-1 me-1 btn btn-default">
                            <i class="fas fa-folder-plus"></i> Roller İzin Ekle
                        </a>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Roller</th> 
                                    <th>İzinler</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $item)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @foreach ($item->permissions as $izin)
                                            <span class="highlight">{{ $izin->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route ('edit.roles.permission',$item->id) }}" class="mb-1 mt-1 me-1 btn btn-sm-info"><i class="fas fa-pen-to-square"></i> </a>
                                        <a href="{{ route ('delete.roles.permission',$item->id) }}" id="delete" class="mb-1 mt-1 me-1 btn btn-sm-danger"><i class="fas fa-trash-can"></i></a>
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
