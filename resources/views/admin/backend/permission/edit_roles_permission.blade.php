@extends('admin.admin_dashboard')
@section('admincontent')

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>Rol İzin Düzenle</h2>

        <div class="right-wrapper text-end" style="margin-right: 30px;">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li><span>Roller & İzinler</span></li>
                <li><span>Rol İzin Düzenle</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Rol İzin Düzenle</h2>
                    </header>
                    <div class="card-body">
                        <form id="myForm" action="{{ route('update.roles.permission',$role->id) }}"
                        method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf
                            <div class="form-group row pb-2 pt-2">
                                <label class="col-lg-3 control-label text-lg-end pt-2">Rol Adı</label>
                                <div class="col-lg-6 form-group">
                                    <h4><strong>{{ $role->name }}</strong></h4>
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
                                            @php
                                                $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                            @endphp
                                            <div class="checkbox-custom checkbox-default">
                                                <input type="checkbox" id="checkbox{{ $group->group_name }}" value=""
                                                {{ App\Models\User::roleHasPermissions($role,$permissions) ? 'checked' : '' }}>
                                                <label for="checkbox{{ $group->group_name }}">{{ $group->group_name }}</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            @foreach ($permissions as $permission)
                                            <div class="checkbox-custom checkbox-default">
                                                <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                id="checkbox{{ $permission->id }}"
                                                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
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
@endsection
