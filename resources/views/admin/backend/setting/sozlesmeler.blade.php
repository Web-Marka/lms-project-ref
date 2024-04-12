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
                    <li><span>Sözleşmeler</span></li>
                </ol>
            </div>
        </header>

        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Gizlilik Politikası</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route('gizlilik.politikasi.store') }}" method="post" enctype="multipart/form-data"
                            class="form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" value="{{ $sozlesmeler->id }}">

                            <div class="form-group row pb-4" style="padding-right: 20px; padding-left: 20px;">
                                <div class="col-lg-12 form-group">
                                    <textarea id="summernote_gizlilik_politikasi" name="gizlilik_politikasi">
                                        {!! $sozlesmeler->gizlilik_politikasi !!}
                                    </textarea>
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
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Çerez Politikası</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route('cerez.politikasi.store') }}" method="post" enctype="multipart/form-data"
                            class="form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" value="{{ $sozlesmeler->id }}">
                            <div class="form-group row pb-4" style="padding-right: 20px; padding-left: 20px;">
                                <div class="col-lg-12 form-group">
                                    <textarea id="summernote_cerez_politikasi" name="cerez_politikasi">
                                        {!! $sozlesmeler->cerez_politikasi !!}
                                    </textarea>
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
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Mesafeli Satış Sözleşmesi</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route('mesafeli.satis.sozlesmesi.store') }}" method="post" enctype="multipart/form-data"
                            class="form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" value="{{ $sozlesmeler->id }}">
                            <div class="form-group row pb-4" style="padding-right: 20px; padding-left: 20px;">
                                <div class="col-lg-12 form-group">
                                    <textarea id="summernote_mesafeli_satis_sozlesmesi" name="mesafeli_satis_sozlesmesi">
                                        {!! $sozlesmeler->mesafeli_satis_sozlesmesi !!}
                                    </textarea>
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

    <script>
        $(function() {
            bsCustomFileInput.init();
        });

        $(document).ready(function() {
            $('#summernote_gizlilik_politikasi').summernote();
        });
        $(document).ready(function() {
            $('#summernote_cerez_politikasi').summernote();
        });
        $(document).ready(function() {
            $('#summernote_mesafeli_satis_sozlesmesi').summernote();
        });
    </script>
@endsection
