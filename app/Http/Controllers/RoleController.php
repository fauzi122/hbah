<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['permission:roles.index|roles.create|roles.edit|roles.delete']);
    }
    public function index()
    {
        $roles = Role::latest()->when(request()->q, function($roles) {
            $roles = $roles->where('name', 'like', '%'. request()->q . '%');
        })->paginate(5);
        
        return view('admin.role.index',compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::latest()->get();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles'
        ]);

        $role = Role::create([
            'name' => $request->input('name')
        ]);

        //assign permission to role
        $role->syncPermissions($request->input('permissions'));

        if($role){
            //redirect dengan pesan sukses
            return redirect('/akses/role')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/akses/role')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Role $role)
    {
        $permissions = Permission::latest()->get();
        return view('admin.role.edit', compact('role', 'permissions'));
       
    }

    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,' . $role->id
        ]);

        $role = Role::findOrFail($role->id);
        $role->update([
            'name' => $request->input('name')
        ]);

        //assign permission to role
        $role->syncPermissions($request->input('permissions'));

        if ($role) {
            //redirect dengan pesan sukses
            return redirect('/akses/role')->with('status','Data Berhasil Ditambah');
        }
            else{
                return redirect('/akses/role')->with('error','Gagal Ditambah');
            }
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $permissions = $role->permissions;
        $role->revokePermissionTo($permissions);
        $role->delete();

        if ($role) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
   
}
