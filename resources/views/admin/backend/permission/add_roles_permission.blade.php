@extends('admin.admin_dashboard')
@section('admincontent')

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>Roller İzin Ekle</h2>

        <div class="right-wrapper text-end" style="margin-right: 30px;">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li><span>Roller & İzinler</span></li>
                <li><span>Roller İzin Ekle</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Roller İzin Ekle</h2>
                    </header>
                    <div class="card-body">
                        <form id="myForm" action="{{ route('role.permission.store') }}"
                        method="post" class="form-horizontal form-bordered">
                            @csrf

                            <div class="form-group row pb-2 pt-2">
                                <label class="col-lg-3 control-label text-lg-end pt-2">Yetkililer</label>
                                <div class="col-lg-6 form-group">
                                    <select name="role_id" class="form-control mb-3">
                                        <option selected="" disabled>Roller Seçin </option>
                                        @foreach ($roles as $role)

                                        <option value="{{ $role->id }}">{{ $role->name }}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row pb-4 pt-4">
                                <label class="col-lg-3 control-label text-lg-end">İzinler</label>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="checkbox-custom checkbox-default">
                                                <input type="checkbox" id="checkboxMain">
                                                <label for="checkboxMain">Tüm İzinler</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row pb-4 pt-4">
                                <label class="col-lg-3 control-label text-lg-end">İzinler</label>

                                <div class="col-lg-6">
                                    @foreach ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="checkbox-custom checkbox-default">
                                                <input type="checkbox" id="checkbox{{ $group->group_name }}">
                                                <label for="checkbox{{ $group->group_name }}">{{ $group->group_name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            @php
                                                $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                            @endphp
                                            @foreach ($permissions as $permission)
                                            <div class="checkbox-custom checkbox-default">
                                                <input type="checkbox" id="checkbox{{ $permission->id }}" name="permission[]" value="{{ $permission->id }}">
                                                <label for="checkbox{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>

                                            @endforeach
                                        </div>

                                    </div>
                                    <hr class="my-2 border-top border-1 border-dark">
                                    @endforeach
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
                group_name: {
                    required : true,
                },
            },
            messages :{
                group_name: {
                    required : 'Lütfen Bir Roller Seçiniz!',
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


<script type="text/javascript">
    $('#checkboxMain').click(function(){
        if ($(this).is(':checked')){
            $('input[type=checkbox]').prop('checked',true)
        } else {
            $('input[type=checkbox]').prop('checked',false)
        }
    });
</script>

@endsection
