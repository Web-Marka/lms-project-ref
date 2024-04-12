@extends('admin.admin_dashboard')
@section('admincontent')

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>Site Yönetimi</h2>

        <div class="right-wrapper text-end" style="margin-right: 30px;">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li><span>Site Yönetimi</span></li>
                <li><span>Site Ayarları</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Site Ayarları</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route ('update.site.setting') }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" value="{{ $siteSetting->id }}">

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="email">Email *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="email" id="email" class="form-control"
                                    value="{{ $siteSetting->email }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="telefon">Telefon *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="telefon" id="telefon" class="form-control"
                                    value="{{ $siteSetting->telefon }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="adres">Adres *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="adres" id="adres" class="form-control"
                                    value="{{ $siteSetting->adres }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="instagram">Instagram *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="instagram" id="instagram" class="form-control"
                                    value="{{ $siteSetting->instagram }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="facebook">Facebook *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="facebook" id="facebook" class="form-control"
                                    value="{{ $siteSetting->facebook }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="twitter">Twitter *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="twitter" id="twitter" class="form-control"
                                    value="{{ $siteSetting->twitter }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="copyright">Copyright Metni *</label>
                                <div class="col-lg-6 form-group">
                                    <textarea type="text" name="copyright"
                                    id="copyright" class="form-control">{{ $siteSetting->copyright }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="footer_description">Footer Firma Açıklama Metni *</label>
                                <div class="col-lg-6 form-group">
                                    <textarea type="text" name="footer_description"
                                    id="footer_description" class="form-control">{{ $siteSetting->footer_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2">Kategori Görseli *</label>
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
                                                <input type="file" id="logo" name="logo" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Sil</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pb-4 d-flex justify-content-center">
                                <div class="col-lg-6">
                                    <img id="siteLogo"
                                    src="{{ asset($siteSetting->logo) }}"
                                    class="rounded img-fluid" height="82" width="250" alt="site Logo">
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
        $('#logo').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#siteLogo').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection
