@extends('admin.admin_dashboard')
@section('admincontent')

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>Rol Düzenle</h2>

        <div class="right-wrapper text-end" style="margin-right: 30px;">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li><span>Roller & İzinler</span></li>
                <li><span>Rol Düzenle</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Rol Düzenle</h2>
                    </header>
                    <div class="card-body">
                        <form id="myForm" action="{{ route('update.roles') }}"
                        method="post" class="form-horizontal form-bordered">
                            @csrf

                            <input type="hidden" name="id" value="{{ $roles->id }}">

                            <div class="form-group row pb-4">
                                <label for="name" class="col-lg-3 control-label text-lg-end pt-2" for="subcategory_name">Rol Adı</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $roles->name }}">
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
            },
            messages :{
                name: {
                    required : 'Lütfen Bir Rol Adı Giriniz!',
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
