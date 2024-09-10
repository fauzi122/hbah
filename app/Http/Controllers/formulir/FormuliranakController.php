<?php

namespace App\Http\Controllers\formulir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\formulir_anak;

class FormuliranakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'nm_lengkap'            => 'required',
            'nm_panggilan'          => 'required',
            'tempat_lahir'          => 'required',
            'tgl'                   => 'required',
            'jk'                    => 'required',
            'email'                 => 'required|unique:formulir_anaks,email',
            'alamat'                => 'required',
            'nm_ortu'               => 'required',
            'kerja_ortu'            => 'required',
            'alamat_kerja_ortu'     => 'required',
            'pendidikan_ortu'       => 'required',
            'no_hp_ortu'            => 'required'
        ]);

        $materi = formulir_anak::create([
        
            'id_priode'             => $request->input('id_priode'),
            'id_level'              => 1,
            'nm_lengkap'            => $request->input('nm_lengkap'),
            'nm_panggilan'          => $request->input('nm_panggilan'),
            'tempat_lahir'          => $request->input('tempat_lahir'),
            'tgl'                   => $request->input('tgl'),
            'jk'                    => $request->input('jk'),
            'email'                 => $request->input('email'),
            'alamat'                => $request->input('alamat'),
            'nm_ortu'               => $request->input('nm_ortu'),
            'kerja_ortu'            => $request->input('kerja_ortu'),
            'alamat_kerja_ortu'     => $request->input('alamat_kerja_ortu'),
            'pendidikan_ortu'       => $request->input('pendidikan_ortu'),
            'no_hp_ortu'            => $request->input('no_hp_ortu')
        ]);
    
        if($materi){
            //redirect dengan pesan sukses
            return redirect('/daftar')->with(['success' => 'Data Formulir Berhasil  Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/daftar')->with(['error' => 'Data Gagal Formulir Disimpan!']);
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
