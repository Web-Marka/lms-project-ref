@extends('admin.admin_dashboard')
@section('admincontent')
    <section role="main" class="content-body card-margin">
        <header class="page-header">
            <h2>Raporlar</h2>

            <div class="right-wrapper text-end" style="margin-right: 30px;">
                <ol class="breadcrumbs">
                    <li>
                        <a href="index.html">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li><span>Rapor Yönetimi</span></li>
                    <li><span>Raporlar</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <header class="card-header">
                        <h2 class="card-title">Rapor Oluştur</h2>
                    </header>
                    <div class="card-body">
                        <div class="tabs-modern row" style="min-height: 490px;">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="general-tab" data-bs-toggle="pill"
                                        data-bs-target="#general" href="#general" role="tab" aria-controls="general"
                                        aria-selected="true"><i class="bx bxs-calendar me-2"></i> Gün Bazlı Arama</a>
                                    <a class="nav-link" id="usage-restriction-tab" data-bs-toggle="pill"
                                        data-bs-target="#usage-restriction" href="#usage-restriction" role="tab"
                                        aria-controls="usage-restriction" aria-selected="false"><i
                                            class="bx bxs-calendar me-2"></i> Ay Bazlı Arama</a>
                                    <a class="nav-link" id="usage-limits-tab" data-bs-toggle="pill"
                                        data-bs-target="#usage-limits" href="#usage-limits" role="tab"
                                        aria-controls="usage-limits" aria-selected="false"><i
                                            class="bx bxs-calendar me-2"></i> Yıl Bazlı Arama</a>
                                </div>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div class="tab-content" id="tabContent">
                                    <div class="tab-pane fade show active" id="general" role="tabpanel"
                                        aria-labelledby="general-tab">

                                        <form action="{{ route('gunluk.rapor') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row align-items-center pb-3">
                                                <label class="col-lg-3 control-label text-lg-end " for="kupon_gecerlilik">Gün Seçimi *</label>
                                                <div class="col-lg-6 form-group">
                                                    <input type="date" name="date" class="form-control">
                                                </div>
                                            </div>
                                            <footer class="card-footer mt-2">
                                                <div class="row d-flex justify-content-end">
                                                    <div class="col-sm-4 mt-2">
                                                        <button type="submit" class="btn btn-primary">Oluştur</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </form>

                                    </div>

                                    <div class="tab-pane fade" id="usage-restriction" role="tabpanel"
                                        aria-labelledby="usage-restriction-tab">
                                        <form action="{{ route('aylik.rapor') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row align-items-center pb-3">
                                                <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">
                                                    Yıl Seçimi *
                                                </label>
                                                <div class="col-lg-7 col-xl-6">
                                                    <select name="year_name" class="form-control">
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                        <option value="2031">2031</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center pb-3">
                                                <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">
                                                    Ay Seçimi *
                                                </label>
                                                <div class="col-lg-7 col-xl-6">
                                                    <select name="month" class="form-control">
                                                        <option>Ocak</option>
                                                        <option>Şubat</option>
                                                        <option>Mart</option>
                                                        <option>Nisan</option>
                                                        <option>Mayıs</option>
                                                        <option>Haziran</option>
                                                        <option>Temmuz</option>
                                                        <option>Ağustos</option>
                                                        <option>Eylül</option>
                                                        <option>Ekim</option>
                                                        <option>Kasım</option>
                                                        <option>Aralık</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <footer class="card-footer mt-2">
                                                <div class="row d-flex justify-content-end">
                                                    <div class="col-sm-4 mt-2">
                                                        <button type="submit" class="btn btn-primary">Oluştur</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="usage-limits" role="tabpanel"
                                        aria-labelledby="usage-limits-tab">
                                        <form action="{{ route('yillik.rapor') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row align-items-center pb-3">
                                                <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">
                                                    Yıl Seçimi *
                                                </label>
                                                <div class="col-lg-7 col-xl-6">
                                                    <select name="year" class="form-control">
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                        <option value="2031">2031</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <footer class="card-footer mt-2">
                                                <div class="row d-flex justify-content-end">
                                                    <div class="col-sm-4 mt-2">
                                                        <button type="submit" class="btn btn-primary">Oluştur</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        <form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
