@extends('admin.admin_dashboard')
@section('admincontent')

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>İzin Düzenle</h2>

        <div class="right-wrapper text-end" style="margin-right: 30px;">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li><span>Roller & İzinler</span></li>
                <li><span>İzin Düzenle</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">İzin Düzenle</h2>
                    </header>
                    <div class="card-body">
                        <form id="myForm" action="{{ route('update.permission') }}"
                        method="post" class="form-horizontal form-bordered">
                            @csrf

                            <input type="hidden" name="id" value="{{ $permission->id }}">

                            <div class="form-group row pb-4">
                                <label for="name" class="col-lg-3 control-label text-lg-end pt-2" for="subcategory_name">İzin Adı</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $permission->name }}">
                                </div>
                            </div>

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2">İzinler</label>
                                <div class="col-lg-6 form-group">
                                    <select name="group_name" class="form-control mb-3">
                                        <option selected="" disabled>İzin Seçin </option>

                                        <option value="Sipariş Yönetimi" {{ $permission->group_name == 'Sipariş Yönetimi' ? 'selected' : '' }}>Sipariş Yönetimi</option>
                                        <option value="Eğitmen Yönetimi" {{ $permission->group_name == 'Eğitmen Yönetimi' ? 'selected' : '' }}>Eğitmen Yönetimi</option>
                                        <option value="Kullanıcı Yönetimi" {{ $permission->group_name == 'Kullanıcı Yönetimi' ? 'selected' : '' }}>Kullanıcı Yönetimi</option>
                                        <option value="Kurs Yönetimi" {{ $permission->group_name == 'Kurs Yönetimi' ? 'selected' : '' }}>Kurs Yönetimi</option>
                                        <option value="Kurs Yorumları" {{ $permission->group_name == 'Kurs Yorumları' ? 'selected' : '' }}>Kurs Yorumları</option>
                                        <option value="Kategori Yönetimi" {{ $permission->group_name == 'Kategori Yönetimi' ? 'selected' : '' }}>Kategori Yönetimi</option>
                                        <option value="Kupon Yönetimi" {{ $permission->group_name == 'Kupon Yönetimi' ? 'selected' : '' }}>Kupon Yönetimi</option>
                                        <option value="Blog Yönetimi" {{ $permission->group_name == 'Blog Yönetimi' ? 'selected' : '' }}>Blog Yönetimi</option>
                                        <option value="Site Yönetimi" {{ $permission->group_name == 'Site Yönetimi' ? 'selected' : '' }}>Site Yönetimi</option>
                                        <option value="Rapor Yönetimi" {{ $permission->group_name == 'Rapor Yönetimi' ? 'selected' : '' }}>Rapor Yönetimi</option>

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
                group_name: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Lütfen Bir İzin Adı Giriniz!',
                },
                group_name: {
                    required : 'Lütfen Bir İzin Seçiniz!',
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
