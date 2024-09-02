<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('permission:Delete User',['only'=>['destroy','delete']]);
    //     $this->middleware('permission:Edit User',['only'=>['update','edit']]);
    //     $this->middleware('permission:Create User',['only'=>['create','add','store']]);
    //     $this->middleware('permission:View User',['only'=>['view','show']]);

    // }
    public function index()
    {
        $User = User::orderBy('id','desc')->get();
        return view('roles_permission.user.index', compact('User'));

    }
    public function create()
    {
        $Role=Role::get();
        return view('roles_permission.user.create', compact('Role'));

    }
    public function store(Request $request)
    {
        $roles = implode(', ', $request->roles);

        if($request->file('Image')) {
            $background_image = $request->file('Image');
            $filename = uniqid() . '.'. $background_image->getClientOriginalExtension();
            $path = public_path('images/user_image');
            $imagepath = $request->Image->move($path, $filename);
        }else{

            $filename=null;
        }


        if($request->update_id)
        {

    DB::beginTransaction();
    try {
        $user = User::find($request->update_id);
        $user->name = $request->name;
        $user->email = $request->email;
if($request->password){
    $user->password = Hash::make($request->password);
}

        $user->contact_number = $request->contact_number;
        $user->gender = $request->Gender;
        $user->designation = $request->short_discription;
        $user->status = $request->status;
        if($request->file('Image')) {
        $user->image = $filename;
        }
        $user->role = $roles;

        $user->save();
        $user->syncRoles($request->roles);

        DB::commit();
        return redirect(route('user-index'))->with('successMessage', 'User Update Successfully');
    } catch (\Exception $exception) {
        DB::rollback();
        return redirect(url('user-index'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
    } catch (\Throwable $exception) {
        DB::rollback();
        return redirect(url('user-index'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
    }
}else{

        DB::beginTransaction();
        try {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'roles'=>'required',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'contact_number' => $request->contact_number,
            'gender' => $request->Gender,
            'designation' => $request->short_discription,
            'status' => $request->status,
            'image' => $filename,
            'role' =>  $roles,
        ]);
            $user->syncRoles( $request->roles);

            DB::commit();
            return redirect(route('user-index'))->with('successMessage', 'User Created Successfully');
        } catch (\Exception $exception) {
            DB::rollback();

            return redirect(url('user-index'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
        } catch (\Throwable $exception) {
            DB::rollback();

            return redirect(url('user-index'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
        }
    }
    }
    public function edit($id)
    {
        $Role=Role::orderBy('id','desc')->get();
        $user = User::find($id);
        return view('roles_permission.user.edit', compact('Role','user'));
    }
    public function view($id)
    {
        $Role=Role::orderBy('id','desc')->get();
        $user = User::find($id);
        return view('roles_permission.user.view', compact('Role','user'));

    }
    public function delete($id)
    {
        $user = User::find($id);
if($user)
{
    $user->delete();
    return redirect(route('user-index'))->with('successMessage', 'User Deleted Successfully');

}else{
    return redirect(url('user-index'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');

}

    }
}
