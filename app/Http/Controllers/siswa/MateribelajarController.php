<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Addmateri;
use App\Models\Addvideo;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class MateribelajarController extends Controller
{
    public function __controller()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         //di buat array utuk deskrip kode nya
        // 0 => "DPG.17.1C.12.A"
        // 1 => "894"
        // 2 => "201704121"
        if(Auth::user()->status == 'S' or Auth::user()->status == 's'){
        $user = User::where('id', Auth::user()->id)->first();

        $pecah=explode(',',Crypt::decryptString($id));
       
        // select video
        $videomhs= Addvideo::join('kelas','addvideos.id_kelas','=','kelas.id')
                    ->select('addvideos.*','kelas.id as id_kelas','kelas.nama as nm_kelas')
                    ->where([
                    'addvideos.id_mtk'    =>$pecah[1],
                    'addvideos.id_kelas'  =>$pecah[0]
                     ])->get();
            
        //materi tambhan
        $materimhs= Addmateri::join('kelas','addmateris.id_kelas','=','kelas.id')
                    ->select('addmateris.*','kelas.id as id_kelas','kelas.nama as nm_kelas')
                    ->where([
                    'addmateris.id_mtk'    =>$pecah[1],
                    'addmateris.id_kelas'  =>$pecah[0]
                     ])->get(); 

        return view('halaman-siswa.materi_belajar.index',compact('user','materimhs','id','videomhs'));
       }else{
            return redirect()->route('home.index');
        }
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
