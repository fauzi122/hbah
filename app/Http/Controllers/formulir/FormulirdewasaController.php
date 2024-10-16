<?php

namespace App\Http\Controllers\formulir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\formulir_dewasa;

class FormulirdewasaController extends Controller
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
        // Waktu minimum antara dua request (dalam detik), misalnya 60 detik
        $minimumInterval = 60;
    
        // Cek waktu request terakhir dari session
        $lastRequestTime = session('last_request_time', 0);
        $currentTime = time();
    
        // Jika waktu request terakhir kurang dari $minimumInterval, tolak request
        if ($currentTime - $lastRequestTime < $minimumInterval) {
            return redirect('/daftar')->with(['error' => 'Tunggu beberapa saat sebelum mengirim data lagi.']);
        }
    
        // Simpan waktu request terbaru di session
        session(['last_request_time' => $currentTime]);
    
        // Validasi input
        $this->validate($request, [
            'nm_lengkap'            => 'required',
            'nm_panggilan'          => 'required',
            'tempat_lahir'          => 'required',
            'tgl'                   => 'required',
            'jk'                    => 'required',
            'email'                 => 'required|unique:formulir_anaks,email',
            'alamat'                => 'required',
            'kerja'                 => 'required',
            'alamat_kerja'          => 'required',
            // 'pendidikan'            => 'required',
            'no_hp'                 => 'required',
            'captcha' => 'required|in:' . session()->get('captcha_answer'),
        ]);
    
        // Simpan data jika validasi berhasil
        $materi = formulir_dewasa::create([
            'id_priode'             => $request->input('id_priode'),
            'id_level'              => 2,
            'nm_lengkap'            => $request->input('nm_lengkap'),
            'nm_panggilan'          => $request->input('nm_panggilan'),
            'tempat_lahir'          => $request->input('tempat_lahir'),
            'tgl'                   => $request->input('tgl'),
            'jk'                    => $request->input('jk'),
            'email'                 => $request->input('email'),
            'alamat'                => $request->input('alamat'),
            'kerja'                 => $request->input('kerja'),
            'alamat_kerja'          => $request->input('alamat_kerja'),
            // 'pendidikan'            => $request->input('pendidikan'),
            'no_hp'                 => $request->input('no_hp')
        ]);
    
        // Redirect dengan pesan sukses atau error
        if($materi){
            return redirect('/daftar')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect('/daftar')->with(['error' => 'Data Gagal Disimpan!']);
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
