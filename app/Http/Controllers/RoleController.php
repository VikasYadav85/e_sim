<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use DB;
class RoleController extends Controller
{



//     public function __construct()
// {
//     $this->middleware('permission:Delete Role',['only'=>['destroy','delete']]);
//     $this->middleware('permission:Edit Role',['only'=>['update','edit']]);
//     $this->middleware('permission:Create Role',['only'=>['create','add','store','addpermissiontorole','updatepermissiontorole']]);
//     $this->middleware('permission:View',['only'=>['view','show']]);


// }
    public function index()
    {
        $Role = Role::orderBy('id', 'desc')->get();
        return view('roles_permission.role.index', compact('Role'));
    }
    public function create()
    {
        return view('roles_permission.role.create');

    }
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $request->validate(
                [
                    'name' => [
                        'required',
                        'string',
                        'unique:roles,name'
                    ]
                ]
            );

            $permission = Role::create([
                'name' => $request->name,
                'status' => $request->status
            ]);

            DB::commit();
            return redirect(url('admin/roles'))->with('successMessage', 'Role Created Successfully');
        } catch (\Exception $exception) {
            DB::rollback();

            return redirect(url('admin/roles'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
        } catch (\Throwable $exception) {
            DB::rollback();


            return redirect(url('admin/roles'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
        }

    }
    public function edit($id)
    {
        $permission = Role::find($id);
        return view('roles_permission.role.edit', compact('permission'));


    }
    public function update(Request $request, Role $role)
    {


        DB::beginTransaction();
        try {
            $request->validate([
                'name' => [
                    'required',
                    'string',
                    'unique:roles,name,' . $role->id
                ]
            ]);
            $role->update([
                'name' => $request->name,
                'status' => $request->status
            ]);
            DB::commit();
            return redirect(url('admin/roles'))->with('successMessage', 'Role updated successfully');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect(url('admin/roles'))->with('alertMessage', 'Oops! Something went wrong, please try again.');
        } catch (\Throwable $exception) {
            DB::rollback();
            return redirect(url('admin/roles'))->with('alertMessage', 'Oops! Something went wrong, please try again.');
        }
    }

    public function destroy($id)
    {

        $Role = Role::find($id);
        if ($Role) {
            $Role->delete();
            return redirect(url('admin/roles'))->with('successMessage', 'Role Deteled successfully');
        } else {
            DB::rollback();
            return redirect(url('admin/roles'))->with('alertMessage', 'Oops! Something went wrong, please try again.');
        }

    }

    public function addpermissiontorole($roleid)
    {
     $Permission=Permission:: get();

     $Role=Role::findOrFail($roleid);

     $rolepermissions=DB::table('role_has_permissions')->where('role_has_permissions.role_id',$Role->id)->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();

     return view('roles_permission.role.give_permission', compact('Role','Permission','rolepermissions'));

    }

    public function updatepermissiontorole( Request $request ,$roleid)
{
    DB::beginTransaction();
    try {
    $request->validate(['permissions' =>'required']);
    $Role=Role::findOrFail($roleid);
    $Role->syncPermissions($request->permissions);
    DB::commit();
    return redirect(url('admin/roles'))->with('successMessage', 'Permission Add Role successfully');
} catch (\Exception $exception) {
    DB::rollback();

    return redirect(url('admin/roles'))->with('alertMessage', 'Oops! Something went wrong, please try again.');
} catch (\Throwable $exception) {
    DB::rollback();
  

    return redirect(url('admin/roles'))->with('alertMessage', 'Oops! Something went wrong, please try again.');
}
}
}

