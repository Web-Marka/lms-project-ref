<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function AllPermission()
    {
        $permission = Permission::all();
        return view('admin.backend.permission.all_permission', compact('permission'));
    }

    public function AddPermission()
    {
        return view('admin.backend.permission.add_permission');
    }

    public function StorePermission(Request $request)
    {
        Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'İzin Başarılı Şekilde Eklendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id)
    {
        $permission = Permission::find($id);
        return view('admin.backend.permission.edit_permission', compact('permission'));
    }

    public function UpdatePermission (Request $request)
    {
        $permission_id = $request->id;

        Permission::find($permission_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'İzin Başarılı Şekilde Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id)
    {
        Permission::find($id)->delete();

        $notification = array(
            'message' => 'İzin Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function AllRoles()
    {
        $roles = Role::all();
        return view('admin.backend.permission.all_roles', compact('roles'));
    }

    public function AddRoles()
    {
        return view('admin.backend.permission.add_roles');
    }

    public function StoreRoles(Request $request)
    {
        Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        $notification = array(
            'message' => 'Rol Başarılı Şekilde Eklendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function EditRoles($id)
    {
        $roles = Role::find($id);
        return view('admin.backend.permission.edit_roles', compact('roles'));
    }

    public function UpdateRoles (Request $request)
    {
        $role_id = $request->id;
        Role::find($role_id)->update([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        $notification = array(
            'message' => 'Rol Başarılı Şekilde Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function DeleteRoles($id)
    {
        Role::find($id)->delete();

        $notification = array(
            'message' => 'Rol Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function AddRolesPermission()
    {
        $roles = Role::all();
        $permission_groups = User::getpermissionGroups();
        $permissions = Permission::all();
        return view('admin.backend.permission.add_roles_permission', compact('roles','permission_groups','permissions'));
    }

    public function RolePermissionStore(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item; 

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message' => 'Rol Başarılı Şekilde Eklendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function AllRolesPermission()
    {
        $roles = Role::all();
        return view('admin.backend.permission.all_roles_permission', compact('roles'));
    }

    public function EditRolesPermission($id)
    {
        $role = Role::find($id);
        $permission_groups = User::getpermissionGroups();
        $permissions = Permission::all();
        return view('admin.backend.permission.edit_roles_permission', compact('role','permission_groups','permissions'));
    }

    public function UpdateRolesPermission(Request $request, $id)
    {
        $role = Role::find($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'İzin Başarılı Şekilde Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function DeleteRolesPermission($id)
    {
        $role = Role::find($id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'İzin Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }
}
