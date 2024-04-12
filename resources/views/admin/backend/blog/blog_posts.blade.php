@extends('admin.admin_dashboard')
@section('admincontent')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Blog</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Blog</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header d-flex justify-content-between">
                        <h2 class="card-title">Blog Yazıları</h2>
                        <a href="{{ route ('add.blog.post') }}" type="button" class="mb-1 mt-1 me-1 btn btn-default">
                            <i class="fas fa-folder-plus"></i> Blog Yazısı Ekle
                        </a>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Blog Görsel</th>
                                    <th>Blog Yazı Başlığı</th>
                                    <th>Blog Kategori</th>
                                    <th>Blog Etiket</th>
                                    <th>Blog Tarih</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead> 
                            <tbody>
                                @foreach ($blog as $key => $item)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img src="{{ asset($item->blog_image) }}" style="width: 50px; height: 45px;"></td>
                                    <td>{{ $item->blog_title }}</td>
                                    <td>{{ $item['blog']['category_name'] }}</td>
                                    <td>{{ $item->blog_tags }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route ('edit.blog.post',$item->id) }}" class="mb-1 mt-1 me-1 btn btn-sm-info"><i class="fas fa-pen-to-square"></i> </a>
                                        <a href="{{ route ('delete.blog.post',$item->id) }}" id="delete" class="mb-1 mt-1 me-1 btn btn-sm-danger"><i class="fas fa-trash-can"></i></a>
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
