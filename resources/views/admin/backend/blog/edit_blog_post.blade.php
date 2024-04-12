@extends('admin.admin_dashboard')
@section('admincontent')

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>Blog Post Ekle</h2>

        <div class="right-wrapper text-end" style="margin-right: 30px;">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li><span>Blog</span></li>
                <li><span>Blog Post Ekle</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Blog Post Ekle Form</h2>
                    </header>
                    <div class="card-body">
                        <form id="postForm" action="{{ route ('update.blog.post') }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" value="{{ $blogPost->id }}">
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="blog_title">Blog Başlığı *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="blog_title" class="form-control" id="blog_title" value="{{ $blogPost->blog_title }}">
                                </div>
                            </div>
                            <div class="form-group row pb-1">
                                <label for="blog_tags" class="col-lg-3 control-label text-lg-end pt-2">Blog Etiket *</label>
                                <div class="col-lg-6">
                                    <input name="blog_tags" value="{{ $blogPost->blog_tags }}" id="blog_tags" data-role="tagsinput" data-tag-class="badge badge-primary" class="form-control" />
                                    <p>
                                        Etiketleri <code>" , "</code> virgül ile ayırın.
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="blog_meta">Blog Meta Açıklama *</label>
                                <div class="col-lg-6 form-group">
                                    <textarea type="text" name="blog_meta" class="form-control" id="blog_meta">{!! $blogPost->blog_meta !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="blog_meta">Blog Kategori *</label>
                                <div class="col-lg-6">
                                    <select name="blogcat_id" id="blogcat_id" class="form-control mb-3">
                                        <option selected="" disabled>Lütfen Bir Kategori Seçiniz</option>
                                        @foreach ($blogCategory as $post)
                                        <option value="{{ $post->id }}" {{ $post->id == $post->blogcat_id ? 'selected' : '' }}>
                                            {{ $post->category_name }}</option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="blog_content">Blog Yazı İçeriği</label>
                                <div class="col-lg-9">
                                    <textarea name="blog_content" id="blog_content" data-plugin-markdown-editor rows="10">{!! $blogPost->blog_content !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2">Blog Görseli *</label>
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
                                                <input type="file" id="image" name="blog_image" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Sil</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pb-4 d-flex justify-content-center">
                                <div class="col-lg-6">
                                    <img id="postImage" src="{{ asset($blogPost->blog_image) }}"
                                        class="rounded img-fluid" height="100" width="100">
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
        $('#postForm').validate({
            rules: {
                blog_title: {
                    required: true,
                    maxlength: 255,
                },
                blog_meta: {
                    required: true,
                    maxlength: 255,
                },
            },
            messages: {
                blog_title: {
                    required: 'Lütfen Kategori Adı Giriniz!',
                    maxlength: 'Kategori Başlığı SEO uyumu açısından en fazla 255 karakter olmalıdır.',
                },
                blog_meta: {
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#postImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection
