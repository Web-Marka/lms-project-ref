@extends('admin.admin_dashboard')
@section('admincontent')

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>Blog Kategori Düzenle</h2>

        <div class="right-wrapper text-end" style="margin-right: 30px;">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li><span>Blog Kategori</span></li>
                <li><span>Blog Kategori Düzenle</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Blog Kategori Düzenle Form</h2>
                    </header>
                    <div class="card-body">
                        <form id="myForm" action="{{ route ('update.blog.category') }}" method="post" class="form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" value="{{ $blogCategory->id }}">
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="category_name">Blog Kategori Adı *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="category_name" class="form-control" id="category_name" value="{{ $blogCategory->category_name }}">
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="category_meta">Blog Kategori Meta Açıklama *</label>
                                <div class="col-lg-6 form-group">
                                    <textarea type="text" name="category_meta" class="form-control" id="category_meta">{{ $blogCategory->category_meta }}</textarea>
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
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                category_name: {
                    required: true,
                    maxlength: 255,
                },
                category_meta: {
                    required: true,
                    maxlength: 255,
                },
            },
            messages: {
                category_name: {
                    required: 'Lütfen Kategori Adı Giriniz!',
                    maxlength: 'Kategori Başlığı SEO uyumu açısından en fazla 255 karakter olmalıdır.',
                },
                category_meta: {
                    required: 'Lütfen Meta Açıklama Giriniz!',
                    maxlength: 'Meta Açıklaması SEO uyumu açısından en fazla 255 karakter olmalıdır.',
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>


@endsection
