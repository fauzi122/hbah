<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); 
        // $this->middleware(['permission:permissions.index']);
    } 

    /**
     * function index
     *
     * @return void
     */
    public function index()
    {
        $permissions = Permission::get();

        return view('admin.permission.index', compact('permissions'));
    }
    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required'   
        ]);
        $permission = Permission::create([
            'name'      => $request->input('name')
        ]);
       
        if($permission){
            return redirect('/akses/permission')->with('status','Data Berhasil Ditambah');}
            else{
                return redirect('/akses/permission')->with('error','Gagal Ditambah');
            }
    }
}