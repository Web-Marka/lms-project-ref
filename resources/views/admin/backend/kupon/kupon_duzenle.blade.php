@extends('admin.admin_dashboard')
@section('admincontent')

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>Kupon Düzenle</h2>

        <div class="right-wrapper text-end" style="margin-right: 30px;">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li><span>Kupon</span></li>
                <li><span>Kupon Düzenle</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Kupon Düzenle Form</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route('admin.update.kupon') }}" method="post" class="form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" value="{{ $kupon->id }}">
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="kupon_adi">Kupon Adı (Türkçe Karakter Kullanmayın!) *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="kupon_adi" class="form-control" id="kupon_adi" value="{{ $kupon->kupon_adi }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="kupon_indirim_tutari">Kupon İndirim (%) *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="kupon_indirim_tutari" class="form-control" id="kupon_indirim_tutari" value="{{ $kupon->kupon_indirim_tutari }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="kupon_gecerlilik">Kupon Geçerlilik Tarihi *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" name="kupon_gecerlilik" class="form-control" id="kupon_gecerlilik" value="{{ $kupon->kupon_gecerlilik }}">
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
