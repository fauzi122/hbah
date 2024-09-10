<?php

namespace App\Http\Controllers\infaq\daftar;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\infaqdaftsantri;

class InfaqController extends Controller
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

        $infaq_daftar= infaqdaftsantri::
        where([
            'jns_bayar'  =>'Infaq Pendaftaran',
            'id_priode' =>$pecah[0]
            ])->get();

        $infaq_buku= infaqdaftsantri::
        where([
            'jns_bayar'  =>'Infaq Buku',
            'id_priode' =>$pecah[0]
            ])->get();
       
        $infaq_qr= infaqdaftsantri::
        where([
            'jns_bayar'  =>'Infaq QR',
            'id_priode' =>$pecah[0]
            ])->get();
        
        return view('infaq.daftar.index',compact('infaq_daftar','infaq_buku','infaq_qr','id'));
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
        //
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
