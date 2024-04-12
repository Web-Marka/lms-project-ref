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
                    <li><span>Anasayfa İçerikleri</span></li>
                </ol>
            </div>
        </header>

        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Anasayfa İçerikleri</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route('admin.basliklar.update') }}" method="post" enctype="multipart/form-data"
                            class="form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" value="{{ $basliklar->id }}">

                            <div class="form-group row pb-4">
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="banner_text_first">Banner Badge İçerik</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="banner_text_first" id="banner_text_first" class="form-control"
                                        value="{{ $basliklar->banner_text_first }}">
                                </div>

                                <label class="col-lg-2 control-label text-lg-end pt-2" for="main_desc">Banner İçerik</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="banner_text_second" id="banner_text_second" class="form-control"
                                        value="{{ $basliklar->banner_text_second }}">
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="badge_title">Anasayfa Badge Başlık</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="badge_title" id="badge_title"
                                        class="form-control" value="{{ $basliklar->badge_title }}">
                                </div>
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="main_mini_title_first_desc">
                                    H1 Başlık</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="h1_title" id="h1_title"
                                        class="form-control" value="{{ $basliklar->h1_title }}">
                                </div>
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="main_mini_title_first_desc">
                                    H1 Açıklama</label>
                                <div class="col-lg-4 form-group">
                                    <textarea type="text" name="h1_desc" id="h1_desc"
                                        class="form-control">{{ $basliklar->h1_desc }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="main_mini_title_second">Kategori Badge İçerik</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="category_badge" id="category_badge"
                                        class="form-control" value="{{ $basliklar->category_badge }}">
                                </div>
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="main_mini_title_first_desc">
                                    Kategori Başlık</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="category_title" id="category_title"
                                        class="form-control" value="{{ $basliklar->category_title }}">
                                </div>
                            </div>


                            <div class="form-group row pb-4">
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="counter_badge">Sayaç Badge İçerik</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="counter_badge" id="counter_badge" class="form-control"
                                        value="{{ $basliklar->counter_badge }}">
                                </div>
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="counter_title">Sayaç Başlık</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="counter_title" id="counter_title" class="form-control"
                                        value="{{ $basliklar->counter_title }}">
                                </div>

                                <label class="col-lg-2 control-label text-lg-end pt-2" for="counter_first">1. Sayaç Numara</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="counter_first" id="counter_first" class="form-control"
                                        value="{{ $basliklar->counter_first }}">
                                </div>
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="counter_first_desc">1. Sayaç Açıklama</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="counter_first_desc" id="counter_first_desc" class="form-control"
                                        value="{{ $basliklar->counter_first_desc }}">
                                </div>

                                <label class="col-lg-2 control-label text-lg-end pt-2" for="counter_second">2. Sayaç Numara</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="counter_second" id="counter_second" class="form-control"
                                        value="{{ $basliklar->counter_second }}">
                                </div>
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="counter_second_desc">2. Sayaç Açıklama</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="counter_second_desc" id="counter_second_desc" class="form-control"
                                        value="{{ $basliklar->counter_second_desc }}">
                                </div>

                                <label class="col-lg-2 control-label text-lg-end pt-2" for="counter_third">3. Sayaç Numara</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="counter_third" id="counter_third" class="form-control"
                                        value="{{ $basliklar->counter_third }}">
                                </div>
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="counter_third_desc">3. Sayaç Açıklama</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="counter_third_desc" id="counter_third_desc" class="form-control"
                                        value="{{ $basliklar->counter_third_desc }}">
                                </div>

                                <label class="col-lg-2 control-label text-lg-end pt-2" for="counter_fourth">4. Sayaç Numara</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="counter_fourth" id="counter_fourth" class="form-control"
                                        value="{{ $basliklar->counter_fourth }}">
                                </div>
                                <label class="col-lg-2 control-label text-lg-end pt-2" for="counter_fourth_desc">4. Sayaç Açıklama</label>
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="counter_fourth_desc" id="counter_fourth_desc" class="form-control"
                                        value="{{ $basliklar->counter_fourth_desc }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-2 control-label text-lg-end pt-2">Anasayfa Görsel (1200x1400)</label>
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
                                                <input type="file" id="main_image" name="main_image" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists"
                                                data-dismiss="fileupload">Sil</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img id="main_image_id" src="{{ asset($basliklar->main_image) }}"
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
            $('#main_image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#main_image_id').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
