<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\Tugassiswa;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TugasController extends Controller
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
    public function index(Request $request,$id)
    {
       //  di buat array utuk deskrip kode nya
        // 0 => "DPG.17.1C.12.A"
        // 1 => "894"
        // 2 => "201704121"
        if(Auth::user()->status == 'S' or Auth::user()->status == 's'){
            $user = User::where('id', Auth::user()->id)->first();

        $pecah=explode(',',Crypt::decryptString($id));
        
        $nilaitugas = Tugassiswa::leftJoin('tugas','tugassiswas.id_tugas', '=', 'tugas.id')
                ->join('kelas','tugas.id_kelas','=','kelas.id')
                ->select('tugas.judul','tugas.id_mtk','tugas.id_kelas',
                        'tugassiswas.*','kelas.id as id_kelas','kelas.nama as nm_kelas')
                ->where('tugassiswas.no_induk',$request->user()->no_induk)
                ->where([
                        'tugas.id_mtk'      =>$pecah[1],  
                        'tugas.id_kelas'    =>$pecah[0]
                    ])->get();
                 
        $tugas_siswa= Tugas::join('kelas','tugas.id_kelas','=','kelas.id')
                ->select('tugas.*','kelas.id as id_kelas','kelas.nama as nm_kelas')
                ->where([
                'tugas.id_mtk'    =>$pecah[1],
                'tugas.id_kelas'  =>$pecah[0]
                ])->get(); 
        return view('halaman-siswa.tugas.index',compact('tugas_siswa','id','nilaitugas'));
    }else{
        return redirect()->route('home.index');
    }
    }

    public function send($id)
    {
        // 0 => "10" kls
        // 1 => "12-002" mtk
        // 2 => "1" id_tugas

        $show=explode(',',Crypt::decryptString($id));
        // dd($show);
        $sendtugas= Tugas::where([
            'id_kelas'      =>$show[0],
            'id_mtk'        =>$show[1],
            'id'            =>$show[2],

            ])->first(); 
        
         return view('halaman-siswa.tugas.send',compact('sendtugas','id'));
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
    
            'no_induk'    => 'required',
            'id_tugas'    => 'required',
            'isi'         => 'required',
         ]);
         
        $tugas= Tugassiswa::updateOrCreate([

            'no_induk' => $request->no_induk, 
            'id_tugas' => $request->id_tugas],
            ['isi'     => $request->isi]
        );

      
        $gabung=Crypt::encryptString($request->input('id_kelas').','.$request->input('id_mtk'));                                    

        if($tugas){
        return redirect('/siswa/tugas/'.$gabung)->with('status','Data Berhasil Ditambah');}
        else{
            return redirect('/siswa/tugas/'.$gabung)->with('status','Gagal Ditambah');
        
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
