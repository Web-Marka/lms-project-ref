@extends('admin.admin_dashboard')
@section('admincontent')

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>Alt Kategori Ekle</h2>

        <div class="right-wrapper text-end" style="margin-right: 30px;">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li><span>Kategoriler</span></li>
                <li><span>Alt Kategori Ekle</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">Alt Kategori Ekle Form</h2>
                    </header>
                    <div class="card-body">
                        <form id="myForm" action="{{ route ('update.subcategory') }}" method="post" class="form-horizontal form-bordered">
                            @csrf

                            <input type="hidden" name="id" value="{{ $subcategory->id }}">

                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="subcategory_name">Alt Kategori Adı</label>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="subcategory_name" class="form-control" id="subcategory_name" value="{{ $subcategory->subcategory_name }}">
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2">Kategoriler</label>
                                <div class="col-lg-6 form-group">
                                    <select name="category_id" class="form-control mb-3">

                                        <option selected="" disabled>Kategori Seçin </option>
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}" {{ $cat->id == $subcategory->category_id ? 'selected' : '' }}>{{ $cat->category_name }}</option>
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
