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
                <li><span>SMTP Ayarları</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">SMTP Ayarları</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route ('update.smtp') }}" method="post" class="form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" value="{{ $smtp->id }}">

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="mailer">MAİLER *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="mailer" id="mailer" class="form-control" placeholder="SMTP"
                                    value="{{ $smtp->mailer }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="host">HOST *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="host" id="host" class="form-control" placeholder="smtp.gmail.com."
                                    value="{{ $smtp->host }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="port">PORT *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="port" id="port" class="form-control" placeholder="SSL=465, TLS=587"
                                    value="{{ $smtp->port }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="username">USERNAME *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="example@gmail.com"
                                    value="{{ $smtp->username }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="password">PASSWORD *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="*******"
                                    value="{{ $smtp->password }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="encryption">ENCRYPTION *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="encryption" id="encryption" class="form-control" placeholder="SSL veya TLS"
                                    value="{{ $smtp->encryption }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2"
                                for="from_address">GONDEREN MAIL ADRESI *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="mail" name="from_address" id="from_address" class="form-control" value="admin@site.com"
                                    value="{{ $smtp->from_address }}">
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
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                subcategory_name: {
                    required : true,
                },
                category_id: {
                    required : true,
                },
            },
            messages :{
                subcategory_name: {
                    required : 'Lütfer Alt Kategori Adı Giriniz!',
                },
                category_id: {
                    required : 'Lütfer Bir Kategori Seçiniz!',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>

@endsection
