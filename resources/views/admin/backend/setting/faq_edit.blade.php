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
                    <li><span>Sıkça Sorulan Sorular</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Sıkça Sorulan Sorular</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route('admin.update.faq', ['id' => $faq_duzenle->id]) }}" method="post" enctype="multipart/form-data"
                            class="form-horizontal form-bordered">
                            @csrf

                            <input type="hidden" name="id" value="{{ $faq_duzenle->id }}">

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="faq_title">Sıkça Sorulan Sorular
                                    Başlık *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="faq_title" id="faq_title" class="form-control" value="{{ $faq_duzenle->faq_title }}">
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="faq_content">Sıkça Sorulan
                                    Sorular İçerik *</label>
                                <div class="col-lg-6 form-group">
                                    <textarea type="text" name="faq_content" id="faq_content" class="form-control">{{ $faq_duzenle->faq_content }}</textarea>
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
@endsection
