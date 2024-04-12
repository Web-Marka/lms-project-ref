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
                        <h2 class="card-title">Sıkça Sorulan Sorular Başlık</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route('admin.faq.main.title.store') }}" method="post"
                            enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf

                            @if ($faq_main_title->id == 1)
                                <input type="hidden" name="id" value="{{ $faq_main_title->id }}">
                            @endif

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="faq_main_title">Sıkça Sorulan
                                    Sorular Sayfa Ana Başlık *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="faq_main_title" class="form-control"
                                        value="{{ $faq_main_title->faq_main_title }}">
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
