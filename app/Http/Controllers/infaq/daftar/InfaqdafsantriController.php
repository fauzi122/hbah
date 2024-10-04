<?php

namespace App\Http\Controllers\infaq\daftar;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\formulir_anak;
use App\Models\formulir_dewasa;
use App\Models\infaqdaftsantri;

class InfaqdafsantriController extends Controller
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
    public function index($id)
    {
        $pecah=explode(',',Crypt::decryptString($id));
    
        $posts = formulir_anak::where([
            'id'        =>$pecah[0],
            'id_level'  =>$pecah[1]
            ])->first();
        
        
        $bayar =infaqdaftsantri::where([
                'id_daftar' =>$pecah[0],
                'id_level'  =>$pecah[1]
                ])->get();
       
            //dd($posts);
        return view('infaq.daftar.anak',compact('id','posts','bayar'));
    }

    public function index_d($id)
    {
        $pecah=explode(',',Crypt::decryptString($id));
    
        $posts = formulir_dewasa::where([
            'id'        =>$pecah[0],
            'id_level'  =>$pecah[1]
            ])->first();
        
        
        $bayar =infaqdaftsantri::where([
                'id_daftar' =>$pecah[0],
                'id_level'  =>$pecah[1]
                ])->get();
       
            //dd($posts);
        return view('infaq.daftar.dewasa',compact('id','posts','bayar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jns_bayar'         => 'required',
            'nm_santri'         => 'required',
            'nominal'           => 'required',
            'tgl_bayar'         => 'required'

        ]);

        $materi = infaqdaftsantri::updateOrCreate([
        
            'id_daftar'             => $request->input('id_daftar'),
            'id_priode'             => $request->input('id_priode'),
            'id_level'             => $request->input('id_level'),
            'jns_bayar'             => $request->input('jns_bayar'),
            'nm_santri'             => $request->input('nm_santri')],
            ['nominal'              => $request->input('nominal'),
            'tgl_bayar'             => $request->input('tgl_bayar'),
            'petugas'               => Auth::user()->no_induk,
           
        ]);
     

        // $gabung=Crypt::encryptString($request->input('id_priode'));                                    
    
        if($materi){
            //redirect dengan pesan sukses
            return redirect('/front/priode-daftar')->with(['success' => 'Data Berhasil  Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/front/priode-daftar')->with(['error' => 'Data Gagal  Disimpan!']);
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
