<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tugas;
use App\Models\Jadwal;
use App\Models\Tugassiswa;
use App\Models\Kelas;
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
    public function index($id)
    {
        //di buat array utuk deskrip kode nya
        // 0 => "11.2D.01"
        // 1 => "11-001"
        // 2 => "201704121"

        if(Auth::user()->status == 'G' or Auth::user()->status == 'A'){
            $user = User::where('id', Auth::user()->id)->first();

            $pecah=explode(',',Crypt::decryptString($id));

            $tugas = Tugas::join('kelas', 'tugas.id_kelas', '=', 'kelas.id')
            ->join('jadwals', 'tugas.id_kelas', '=', 'jadwals.id_kelas')
            ->select('tugas.*','kelas.nama as nm_kelas','jadwals.nm_mtk')
                ->where([
                    'tugas.no_induk'       =>Auth::user()->no_induk,
                    'tugas.id_kelas'       =>$pecah[0],
                    'tugas.id_mtk'         =>$pecah[1]
               
                    ])->get();

                // dump($pecah);
            return view('tugas.index', compact('user','tugas','id'));
        }else{
           return redirect('/home');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //di buat array utuk deskrip kode nya
        // 0 => "11.2D.01"
        // 1 => "11-001"
        // 2 => "201704121"

        if(Auth::user()->status == 'G' or Auth::user()->status == 'A'){
            $user = User::where('id', Auth::user()->id)->first();
   
            $pecah=explode(',',Crypt::decryptString($id));

            $jadwals = Jadwal::join('kelas', 'jadwals.id_kelas', '=', 'kelas.id')
            ->select('jadwals.*','kelas.nama as nm_kelas')
            ->where([
                'jadwals.no_induk'       =>Auth::user()->no_induk,
                'jadwals.id_kelas'       =>$pecah[0],
                'jadwals.id_mtk'         =>$pecah[1]
           
                ])->first();

            // dump($jadwals);

       return view('tugas.create',compact('user','jadwals','id'));
        
        }else{
           return redirect('/home');
             }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //  tugas tambahan
       $this->validate($request, [

        'no_induk'    => 'required',
        'id_kelas'    => 'required',
        'id_mtk'      => 'required',
        'judul'       => 'required',
        'des'         => 'required',
        'file'        => 'required',
        'mulai'       => 'required',
        'jam_mulai'   => 'required',
        'selsai'      => 'required',
        'jam_selsai'  => 'required',
       
    ]);

    // $file = $request->file('file');
    // $file->storeAs('public/materi', $file->hashName());
    $addtugas = Tugas::create([

        'no_induk'      => $request->input('no_induk'),
        'id_kelas'      => $request->input('id_kelas'),
        'id_mtk'        => $request->input('id_mtk'),
        'judul'         => $request->input('judul'),
        'des'           => $request->input('des'),
        'file'          => $request->input('file'),
        'mulai'         => $request->input('mulai').' '.$request->input('jam_mulai'),
        'selsai'        => $request->input('selsai').' '.$request->input('jam_selsai'),
        // 'file'          => $file->hashName()
       
    ]);

   $gabung=Crypt::encryptString($request->input('id_kelas').','.$request->input('id_mtk').','.$request->input('no_induk'));

    if($addtugas){
    return redirect('/elearning/tugas/'.$gabung)->with('status','Data Ditambah');}
    else{
        return redirect('/elearning/tugas/'.$gabung)->with('error','Gagal Ditambah');
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
         //di buat array utuk deskrip kode nya
        // 0 => "11.2D.01"
        // 1 => "11-001"
        // 2 => "201704121"
        // $pecah=explode(',',Crypt::decryptString($id));
       
        // $tugas = Tugas::where([
        //     'id'  =>$pecah[0]
        //     ])->first();
         
        // $usersiswa = DB::table('tugas')
        // ->join('kelas', 'tugas.id_kelas', '=', 'kelas.id')
        // ->join('users', 'users.id_kelas', '=', 'kelas.id')
        // ->select(
        //     'users.id_kelas', 
        //     'users.status', 
        //     'users.nama as nm_user', 
        //     'users.no_induk', 
        
        //     'tugas.id_kelas', 
        //     'tugas.id as id_t',
            
        //     'kelas.id as id_k',
        //     'kelas.nama as nm_kelas',
        //     )
        //     ->whereIn('users.status', ['S','s'])
        //     ->groupBy('users.no_induk')
        //     ->get();

        // $nilai = app('App\Models\Tugas')->nilai_mhs($pecah[0]);

        // return view('tugas.lihat',compact('tugas','id','usersiswa','nilai'));
        $pecah=explode(',',Crypt::decryptString($id));
        // dd($pecah);
        $tugas = Tugas::where(['id'  =>$pecah[0]])->first();
        $mahasiswa = app('App\Models\Tugas')->showMhs($pecah[1]);
        $nilai = app('App\Models\Tugas')->nilai_mhs($pecah[0]);
        //dd($mahasiswa);
        // dd($nilai['12190874 ']->isi);
        return view('tugas.lihat',compact('tugas','mahasiswa','nilai','id'));
        // return view('admin.tugas.create',compact('tugas'));
    }

    public function send_tugas(Request $request)
    {
        for ($i=1;$i<=count($request->no_urut);$i++) {
            $tugas=Tugassiswa::updateOrCreate(
            [
            'no_induk' => $request->no_urut[$i],
            'id_tugas' =>$request->id_tugas
        ],

            [
            'no_induk'  =>$request->no_urut[$i],
            'nilai'     =>$request->nilai[$i],
            'komentar'  =>$request->komentar[$i]
            ]
        );
    }
    if($tugas){
        return redirect('/elearning/tugas/lihat/'.$request->id)->with('status','Data Berhasil Diupdate');}
        else{
            return redirect('/elearning/tugas/lihat/'.$request->id)->with('error','Gagal Diupdate');
        
        }
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
		  
	$biodata = Tugas::findOrFail($id);
	// dd($id_mtk);
	$biodata->delete();

	if($biodata){
		return response()->json([
			'status' => 'success'
		]);
	}else{
		return response()->json([
			'status' => 'error'
		]);
	}
  
    }
}
