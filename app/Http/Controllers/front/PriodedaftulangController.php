<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Priodeulang;

class PriodedaftulangController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['permission:priodeulang.index|priodeulang.create|priodeulang.edit|priodeulang.delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ulang=Priodeulang::get();
        return view('admin.daftar.priodeulang.index',compact('ulang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.daftar.priodeulang.create');
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
            'priode'        => 'required',
            'tgl_awal'      => 'required',
            'tgl_akhir'     => 'required',
            'ket'           => 'required|unique:priodeulangs,ket'
           
        ]);

        $materi = Priodeulang::create([
        
            'priode'        => $request->input('priode'),
            'tgl_awal'      => $request->input('tgl_awal'),
            'tgl_akhir'     => $request->input('tgl_akhir'),
            'ket'           => $request->input('ket'),
            'no_induk'      => Auth::user()->no_induk
            
        ]);

        if($materi){
            //redirect dengan pesan sukses
            return redirect('/front/priode-ulang')->with(['success' => 'Data Formulir Berhasil  Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/front/priode-ulang')->with(['error' => 'Data Gagal Formulir Disimpan!']);
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
