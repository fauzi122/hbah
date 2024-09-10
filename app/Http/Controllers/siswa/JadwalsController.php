<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Jawab;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Absen_ajar;
use App\Models\Absen_siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;




class JadwalsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
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
  
                $jadwal_siswa= Jadwal::join('kelas','jadwals.id_kelas', '=', 'kelas.id') 
                ->join('users','jadwals.no_induk','=', 'users.no_induk')
                ->select(
                    'jadwals.*',
                    'kelas.id',
                    'kelas.nama as nm_kelas',
                    'users.nama as nm_guru')  
                ->where('jadwals.id_kelas',Auth::user()->id_kelas)
                ->groupBy(
                    'jadwals.no_induk',
                    'jadwals.id_mtk',
                    'jadwals.id_kelas'
                )->get();
               
            return view('halaman-siswa.jadwal.index', compact('user','jadwal_siswa'));
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
    // 0 => "894"
    // 1 => "DASAR PEMROGRAMAN "
    // 2 => "GNB"
    // 3 => "DPG.19.1A.12.A"
    // 4 => "Senin"
    // 5 => "11:40-15:00"
    // 6 => "201-G1"
    $exp = explode(",",Crypt::decryptString($id));
    $tgl=date('Y-m-d');
    $jam=date("H:i");

// $cek = Absen_ajar_praktek::where($w_cek)->count();

   $cek_teori = Jadwal::where([
       'id_kelas'   =>$exp[3],
       'id_mtk'     =>$exp[0]
       ])->count();
  
   $absen = Absen_ajar::where([
       'id_kelas'   =>$exp[3],
       'id_mtk'     =>$exp[0],
       'tgl_ajar'   =>date('Y-m-d'),
       'jam_t'      =>$exp[5]
    ]);
  
   $absen_cek  = Absen_ajar::where([
       'id_kelas'   =>$exp[3],
       'id_mtk'     =>$exp[0]
       ])->orderByDesc('pertemuan');

   if($cek_teori>0){

        $durasi = Jadwal::where([
            'id_kelas'  =>$exp[3],
            'id_mtk'    =>$exp[0]])
        ->where('selesai','>=', $jam)->count();

        $absen_mhs  = Absen_siswa::Where([
            'id_kelas'      =>$exp[3],
            'id_mtk'        =>$exp[0],
            'pertemuan'     =>$absen_cek->first()->pertemuan,
            'nis'           =>Auth::user()->no_induk
            ])->count();

    }else{
        // $durasi     = Jadwal::where(['kd_gabung'=>$exp[4],'id_mtk'=>$exp[0]])
        //                     ->where('selesai','>=', $jam)->count();
        // $absen_mhs  = Absen_siswa::Where(['kd_gabung'=>$exp[4],'id_mtk'=>$exp[0],'pertemuan'=>$absen_cek->first()->pertemuan,'nim'=>Auth::user()->username])->count();
                            
    }

//dd($absen->first()->pertemuan);

// $komentar=DB::table('komentar_mhs')
//     ->where(['user'=>Auth::user()->no_induk,'id_mtk'=>$exp[0],'id_kelas'=>$exp[3]])
//     ->where(DB::raw('LEFT(created_at,10)'),$tgl)
//     ->count();
return view('halaman-siswa.jadwal.absen_siswa',compact('id','absen','exp'));

// return view('halaman-siswa.jadwal.absen_siswa',compact('id'));

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
