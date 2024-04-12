@extends('admin.admin_dashboard')
@section('admincontent')

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>Yonetici Düzenle</h2>

        <div class="right-wrapper text-end" style="margin-right: 30px;">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li><span>Roller Yönetimi</span></li>
                <li><span>Yonetici Düzenle</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Yonetici Düzenle</h2>
                    </header>
                    <div class="card-body">
                        <form id="myForm" action="{{ route('yonetici.update',$user->id) }}"
                            method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf

                            <input type="hidden" name="id" value="{{ $user->id }}">

                            <div class="form-group row pb-4">
                                <label for="name" class="col-lg-3 control-label text-lg-end pt-2"
                                for="name">Yönetici Adı *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                    value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label for="username" class="col-lg-3 control-label text-lg-end pt-2"
                                for="username">Yönetici Kullanıcı Adı *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="username" class="form-control" id="username"
                                    value="{{ $user->username }}">
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label for="email" class="col-lg-3 control-label text-lg-end pt-2"
                                for="email">Yönetici Email *</label>
                                <div class="col-lg-6 form-group">
                                    <input type="email" name="email" class="form-control" id="email"
                                    value="{{ $user->email }}" >
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label for="phone" class="col-lg-3 control-label text-lg-end pt-2"
                                for="phone">Yönetici Telefon *</label>
                                <div class="col-lg-6 form-group">
                                    <input id="phone" name="phone" data-plugin-masked-input=""
                                    data-input-mask="(999) 999-99-99"
                                    placeholder="(555) 555-55-00" class="form-control"
                                    value="{{ $user->phone }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2">Yönetici Rol Alanı *</label>
                                <div class="col-lg-6 form-group">
                                    <select name="roles" class="form-control mb-3">
                                        <option selected disabled>Rol Seçin</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
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
                name: {
                    required : true,
                },
                username: {
                    required : true,
                },
                email: {
                    required : true,
                },
                phone: {
                    required : true,
                },
                password: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Lütfen Bu Alanı Doldurunuz!',
                },
                username: {
                    required : 'Lütfen Bu Alanı Doldurunuz!',
                },
                email: {
                    required : 'Lütfen Bu Alanı Doldurunuz!',
                },
                phone: {
                    required : 'Lütfen Bu Alanı Doldurunuz!',
                },
                password: {
                    required : 'Lütfen Bu Alanı Doldurunuz!',
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
