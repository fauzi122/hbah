<?php

namespace App\Http\Controllers\infaq\ulang;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Models\infaqulangsantri;
use Illuminate\Http\Request;
use App\Models\Daftarulang;


class InfaqulangsantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pecah=explode(',',Crypt::decryptString($id));
       
        $posts = Daftarulang::where([
            'id_priode'   =>$pecah[0],
            'no_induk'    =>$pecah[1]
            ])->first();
           

        $bayar =infaqulangsantri::where([
            'id_priode'   =>$pecah[0],
            'no_induk'    =>$pecah[1]
            ])->get();
       
        return view('infaq.ulang.index',compact('bayar','id','posts'));
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

            'nm_santri'         => 'required',
            'jns_bayar'         => 'required',
            'tgl_bayar'         => 'required',
            'nominal'           => 'required'

        ]);

        $materi = infaqulangsantri::updateOrCreate([
        
            
            'id_priode'             => $request->input('id_priode'),
            'no_induk'              => $request->input('no_induk'),
            'nm_santri'             => $request->input('nm_santri'),
            'jns_bayar'             => $request->input('jns_bayar'),
            'tgl_bayar'             => $request->input('tgl_bayar')],
            ['nominal'              => $request->input('nominal'),
            'petugas'               => Auth::user()->no_induk,
           
        ]);

        // $gabung=Crypt::encryptString($request->input('id_priode'));  
        if($materi){
            //redirect dengan pesan sukses
            return redirect('/front/priode-ulang')->with(['success' => 'Data Berhasil  Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/front/priode-ulang')->with(['error' => 'Data Gagal  Disimpan!']);
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
