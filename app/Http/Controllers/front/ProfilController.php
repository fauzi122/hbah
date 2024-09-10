<?php

namespace App\Http\Controllers\front;

use App\Models\Sejarah;
use App\Models\Sambutan;
use App\Models\Visimisi;
use Illuminate\Http\Request;
use App\Models\Profilsekolah;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['permission:visimisis.index|sejarah.index|profil.index|sambutan.index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visi = Visimisi::where('id', 1)->first();
        $sejarah = Sejarah::where('id', 1)->first();
        $profil= Profilsekolah::where('id', 1)->first();
        $sambutan= Sambutan::where('id', 1)->first();
        return view('admin.profil.index',compact('visi','sejarah','profil','sambutan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_sambutan($id)
    {
        $sambutan = Sambutan::first();
        //dd($sambutan);
        return view('admin.profil.sambutan',compact('sambutan'));
    }

    public function edit_visimisi($id)
    {
        $visimisi = Visimisi::first();
        return view('admin.profil.visimisi',compact('visimisi'));
    }

    public function edit_sejarah($id)
    {
        $sejarah = Sejarah::first();
        return view('admin.profil.sejarah',compact('sejarah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_sambutan(Request $request, Sambutan $sambutan)
    {
        $this->validate($request,[
            'nm_kep'   => 'required',
            'des'      => 'required'
        ]);

        if ($request->file('foto') == "") {
        
            $sambutan = Sambutan::findOrFail($sambutan->id);
            $sambutan->update([
                'no_induk'      => Auth::user()->no_induk,
                'nm_kep'        => $request->input('nm_kep'),
                'des'           => $request->input('des')
            ]);

        } else {

            //remove old foto
            Storage::disk('local')->delete('public/guru/'.$sambutan->foto);

            //upload new foto
            $foto = $request->file('foto');
            $foto->storeAs('public/guru', $foto->hashName());

            $sambutan = Sambutan::findOrFail($sambutan->id);
            $sambutan->update([
                'foto'       => $foto->hashName(),
                'no_induk'      => Auth::user()->no_induk,
                'nm_kep'        => $request->input('nm_kep'),
                'des'           => $request->input('des') 
            ]);

        }

        if($sambutan){
            //redirect dengan pesan sukses
            return redirect('/front/profil')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/front/profil')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function update_visimisi(Request $request, Visimisi $visimisi)
    {
        $this->validate($request,[
            'visi'   => 'required',
            'misi'   => 'required'
        ]);

            $visimisi = Visimisi::findOrFail($visimisi->id);
            $visimisi->update([

                'visi'        => $request->input('visi'),
                'misi'        => $request->input('misi'),
                'no_induk'    => Auth::user()->no_induk
            ]);

        

        if($visimisi){
            //redirect dengan pesan sukses
            return redirect('/front/profil')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/front/profil')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
    public function update_sejarah(Request $request, Sejarah $sejarah)
    {
        $this->validate($request,[
            'des'   => 'required'
            
        ]);

            $sejarah = Sejarah::findOrFail($sejarah->id);
            $sejarah->update([

                'des'        => $request->input('des'),
                'no_induk'    => Auth::user()->no_induk
            ]);

        

        if($sejarah){
            //redirect dengan pesan sukses
            return redirect('/front/profil')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/front/profil')->with(['error' => 'Data Gagal Diupdate!']);
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
