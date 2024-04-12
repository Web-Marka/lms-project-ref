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
                    <li><span>Hakkımızda</span></li>
                </ol>
            </div>
        </header>

        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Hakkımızda</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route('admin.hakkimizda.update') }}" method="post" enctype="multipart/form-data"
                            class="form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" value="{{ $hakkimizda->id }}">

                            <div class="form-group row pb-4">
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="main_title">Ana Başlık</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="main_title" id="main_title" class="form-control"
                                        value="{{ $hakkimizda->main_title }}">
                                </div>

                                <label class="col-lg-2 control-label text-lg-end pt-2" for="main_desc">Ana Başlık
                                    Açıklama</label>
                                <div class="col-lg-4 form-group">
                                    <textarea type="text" name="main_desc" id="main_desc" class="form-control">{{ $hakkimizda->main_desc }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="main_mini_title_first">Ana
                                    Başlık 1. Madde Başlığı</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="main_mini_title_first" id="main_mini_title_first"
                                        class="form-control" value="{{ $hakkimizda->main_mini_title_first }}">
                                </div>
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="main_mini_title_first_desc">Ana
                                    Başlık 1. Madde Açıklama</label>
                                <div class="col-lg-4 form-group">
                                    <textarea type="text" name="main_mini_title_first_desc" id="main_mini_title_first_desc" class="form-control">{{ $hakkimizda->main_mini_title_first_desc }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="main_mini_title_second">Ana
                                    Başlık 1. Madde Başlığı</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="main_mini_title_second" id="main_mini_title_second"
                                        class="form-control" value="{{ $hakkimizda->main_mini_title_second }}">
                                </div>
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="main_mini_title_second_desc">Ana
                                    Başlık 1. Madde Açıklama</label>
                                <div class="col-lg-4 form-group">
                                    <textarea type="text" name="main_mini_title_second_desc" id="main_mini_title_second_desc" class="form-control">{{ $hakkimizda->main_mini_title_second_desc }}</textarea>
                                </div>
                            </div>


                            <div class="form-group row pb-4">
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="second_title">İkinci Bölüm
                                    Başlık</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="second_title" id="second_title" class="form-control"
                                        value="{{ $hakkimizda->second_title }}">
                                </div>
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="second_desc">İkinci Bölüm
                                    Açıklama</label>
                                <div class="col-lg-4 form-group">
                                    <textarea type="text" name="second_desc" id="second_desc" class="form-control">{{ $hakkimizda->second_desc }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="third_title">Üçüncü Bölüm
                                    Başlık</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="third_title" id="third_title" class="form-control"
                                        value="{{ $hakkimizda->third_title }}">
                                </div>
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="third_desc_one">Üçüncü Bölüm
                                    Birinci Açıklama</label>
                                <div class="col-lg-4 form-group">
                                    <textarea type="text" name="third_desc_one" id="third_desc_one" class="form-control">{{ $hakkimizda->third_desc_one }}</textarea>
                                </div>

                                <label class="col-lg-2 control-label text-lg-end pt-2" for="third_desc_two">Üçüncü Bölüm
                                    İkinci Açıklama</label>
                                <div class="col-lg-4 form-group">
                                    <textarea type="text" name="third_desc_two" id="third_desc_two" class="form-control">{{ $hakkimizda->third_desc_two }}</textarea>
                                </div>
                            </div>


                            <div class="form-group row pb-4">
                                <label class="col-lg-2 control-label text-lg-end pt-2">Görsel -1 (280x250)</label>
                                <div class="col-lg-4 form-group">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Değiştir</span>
                                                <span class="fileupload-new">Dosya Seç</span>
                                                <input type="file" id="img_small" name="img_small" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists"
                                                data-dismiss="fileupload">Sil</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img id="img_small_id" src="{{ asset($hakkimizda->img_small) }}"
                                        class="rounded img-fluid" height="82" width="250" alt="hakkimizda görsel">
                                </div>
                            </div>


                            <div class="form-group row pb-4">
                                <label class="col-lg-2 control-label text-lg-end pt-2">Görsel -2 (400x490)</label>
                                <div class="col-lg-4 form-group">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Değiştir</span>
                                                <span class="fileupload-new">Dosya Seç</span>
                                                <input type="file" id="img_medium" name="img_medium" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists"
                                                data-dismiss="fileupload">Sil</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img id="img_medium_id" src="{{ asset($hakkimizda->img_medium) }}"
                                        class="rounded img-fluid" height="82" width="250" alt="hakkimizda görsel">
                                </div>
                            </div>


                            <div class="form-group row pb-4">
                                <label class="col-lg-2 control-label text-lg-end pt-2">Görsel -3 (490x500)</label>
                                <div class="col-lg-4 form-group">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Değiştir</span>
                                                <span class="fileupload-new">Dosya Seç</span>
                                                <input type="file" id="img_large" name="img_large" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists"
                                                data-dismiss="fileupload">Sil</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img id="img_large_id" src="{{ asset($hakkimizda->img_large) }}"
                                        class="rounded img-fluid" height="82" width="250" alt="hakkimizda görsel">
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
            $('#img_small').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img_small_id').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });

        $(document).ready(function() {
            $('#img_medium').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img_medium_id').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });

        $(document).ready(function() {
            $('#img_large').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img_large_id').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
