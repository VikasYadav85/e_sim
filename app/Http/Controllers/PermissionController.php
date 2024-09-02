<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use DB;

class PermissionController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('permission:Delete Permission',['only'=>['destroy','delete']]);
    //     $this->middleware('permission:Edit Permission',['only'=>['update','edit']]);
    //     $this->middleware('permission:Create permission',['only'=>['create','add','store']]);
    //     $this->middleware('permission:View',['only'=>['view','show']]);


    // }
    public function index()
    {
        $permission = Permission::orderBy('id', 'desc')->get();
        return view('roles_permission.permission.index', compact('permission'));
    }
    public function create()
    {
        return view('roles_permission.permission.create');

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
                        'unique:permissions,name'
                    ]
                ]
            );

            $permission = Permission::create([
                'name' => $request->name,
                'status' => $request->status
            ]);

            DB::commit();
            return redirect(url('admin/permissions'))->with('successMessage', 'Permissions Created Successfully');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect(url('admin/permissions'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
        } catch (\Throwable $exception) {
            DB::rollback();
            return redirect(url('admin/permissions'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
        }

    }
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('roles_permission.permission.edit', compact('permission'));


    }
    public function update(Request $request, Permission $permission)
    {


        DB::beginTransaction();
        try {
            $request->validate([
                'name' => [
                    'required',
                    'string',
                    'unique:permissions,name,' . $permission->id
                ]
            ]);
            $permission->update([
                'name' => $request->name,
                'status' => $request->status
            ]);
            DB::commit();
            return redirect(url('admin/permissions'))->with('successMessage', 'Permission updated successfully');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect(url('admin/permissions'))->with('alertMessage', 'Oops! Something went wrong, please try again.');
        } catch (\Throwable $exception) {
            DB::rollback();
            return redirect(url('admin/permissions'))->with('alertMessage', 'Oops! Something went wrong, please try again.');
        }
    }

    public function destroy($id)
    {

        $permission = Permission::find($id);
        if ($permission) {
            $permission->delete();
            return redirect(url('admin/permissions'))->with('successMessage', 'Permission Deteled successfully');
        } else {
            DB::rollback();
            return redirect(url('admin/permissions'))->with('alertMessage', 'Oops! Something went wrong, please try again.');
        }

    }

}
