@extends('admin.admin_dashboard')
@section('admincontent')

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>Kategori Düzenle</h2>

        <div class="right-wrapper text-end" style="margin-right: 30px;">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li><span>Kategori</span></li>
                <li><span>Kategori Düzenle</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">Kategori Düzenle Form</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route ('update.category') }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf

                            <input type="hidden" name="id" value="{{ $category->id }}">

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="category_name">Kategori Adı</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="category_name" class="form-control" id="category_name" value="{{ $category->category_name }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2">Kategori Görseli</label>
                                <div class="col-lg-6 form-group">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Değiştir</span>
                                                <span class="fileupload-new">Dosya Seç</span>
                                                <input type="file" id="image" name="image" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Sil</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pb-4 d-flex justify-content-center">
                                <div class="col-lg-6">
                                    <img id="categoryImage" src="{{ asset($category->image) }}"
                                        class="rounded img-fluid" height="300" width="180" alt="user photo">
                                </div>
                            </div>
                            <footer class="card-footer">
                                <div class="row d-flex justify-content-end">
                                    <div class="col-sm-4 mt-3">
                                        <button type="submit" class="btn btn-primary">Kaydet</button>
                                    </div>
                                </div>
                            </footer>
                        </form>
                    </div>
                </section>
            </div>
        </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#categoryImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection
