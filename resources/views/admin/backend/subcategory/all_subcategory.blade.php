@extends('admin.admin_dashboard')
@section('admincontent')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Alt Kategoriler</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Kategori</span></li>
                    <li><span>Alt Kategoriler</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header d-flex justify-content-between">
                        <h2 class="card-title">Alt Kategori Tablosu</h2>
                        <a href="{{ route ('add.subcategory') }}" type="button" class="mb-1 mt-1 me-1 btn btn-default">
                            <i class="fas fa-folder-plus"></i> Alt Kategori Ekle
                        </a>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kategori Adı</th>
                                    <th>Alt Kategori Adı</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategory as $key => $item)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item['category']['category_name'] }}</td>
                                    <td>{{ $item->subcategory_name }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route ('edit.subcategory',$item->id) }}" class="mb-1 mt-1 me-1 btn btn-sm-info"><i class="fas fa-pen-to-square"></i> </a>
                                        <a href="{{ route ('delete.subcategory',$item->id) }}" id="delete" class="mb-1 mt-1 me-1 btn btn-sm-danger"><i class="fas fa-trash-can"></i></a>
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
