<?php

namespace App\Http\Controllers\siswa\ulang;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\Daftarulang;
use App\Models\Priodeulang;
use App\User;

class DaftarulangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['permission:daftaranak.index|daftaranak.create|daftaranak.edit|daftaranak.delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->status == 'S' or Auth::user()->status == 's'){
        $user = User::where('id', Auth::user()->id)->first();

        $status=Daftarulang::where('no_induk', Auth::user()->no_induk)->first();
        $priode=Priodeulang::where('ket',1)->first();
        return view('halaman-siswa.daftarulang.index',compact('status','user','priode'));
     }else{
        return redirect('/home');
     }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pecah=explode(',',Crypt::decryptString($id));
        return view('halaman-siswa.daftarulang.create',compact('id','pecah'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //   daftar ulang
       $this->validate($request, [

        'no_induk'    => 'required|unique:daftarulangs,no_induk',
        'nm_siswa'    => 'required'
      
       
    ]);
    $addulang = Daftarulang::updateOrCreate([

        'no_induk'      => $request->input('no_induk'),
        'id_priode'     => $request->input('id_priode'),
        'nm_siswa'      => $request->input('nm_siswa')],
        ['status'        =>1
      
       
    ]);
  
    if($addulang){
    return redirect('/siswa/daftar-ulang')->with('status','Data Ditambah');}
    else{
        return redirect('/siswa/daftar-ulang')->with('error','Gagal Ditambah');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
