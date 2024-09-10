<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;



class LatihanujianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->status == 'G' or Auth::user()->status == 'A') {
            $user = User::where('id', Auth::user()->id)->first();
        
            if (Auth::user()->status == 'G') {
              $soals = Soal::where('id_user', Auth::user()->id)->paginate(5);
            } elseif (Auth::user()->status == 'A') {
              $soals = Soal::orderBy('id', 'DESC')->paginate(5);
            }
            // $materis = Materi::where('id_user', Auth::user()->id)->get();
            return view('latihanujian.index', compact('user', 'soals'));
          } else {
           return redirect('/home');
          }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materis = Jadwal::where('no_induk', Auth::user()->no_induk)
        ->get();
        return view('latihanujian.create',compact('materis'));
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
            'no_induk'          => 'required',
            'jenis'             => 'required',
            'materi'            => 'required',
            'paket'             => 'required',
            'deskripsi'         => 'required',
            'kkm'               => 'required',
            'waktu'             => 'required',
            'tgl_ujian'         => 'required',
            'jam_mulai_ujian'   => 'required',
            'tgl_selsai_ujian'  => 'required',
            'jam_selsai_ujian'  => 'required',
           
        ]);
      
            $soal = Soal::create([
            'id_user'           => $request->input('no_induk'),
            'jenis'             => $request->input('jenis'),
            'id_mtk'            => $request->input('materi'),
            'paket'             => $request->input('paket'),
            'deskripsi'         => $request->input('deskripsi'),
            'kkm'               => $request->input('kkm'),
            'waktu'             => $request->input('waktu'),
            'tgl_ujian'         => $request->input('tgl_ujian').' '.$request->input('jam_mulai_ujian'),
            'tgl_selsai_ujian'  => $request->input('tgl_selsai_ujian').' '.$request->input('jam_selsai_ujian'),
           
        ]);
      
        if($soal){
        return redirect('/elearning/latihan')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect('/elearning/latihan')->with(['error' => 'Data Gagal Disimpan!']);
          }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dataSoal()
{
    if (Auth::user()->status == 'G' or Auth::user()->status == 'A') {

    $soals = DB::table('soals')
            ->join('mapels', 'soals.id_mtk', '=', 'mapels.id_mtk')
            ->select('soals.*', 'mapels.id_mtk','mapels.nm_mtk')
            ->where('jenis', 2)
            ->where('paket', 'LATIHAN')
            ->where('id_user', Auth::user()->id)->get();
          
  } else{
   return redirect('/home');
  }
  return DataTables::of($soals)
    ->editColumn('waktu', function ($soals) {
      return $soals->waktu . ' menit';
    })
    ->editColumn('jenis', function ($soals) {
      if ($soals->jenis == 1) {
        return '<center><span class="label label-warning">Ujian</label></center>';
      } else{
        return '<center><span class="label label-danger">Latihan</label></center>';
      }
    })
    ->editColumn('kkm', function ($soals) {
      return "<center>" . $soals->kkm . "</center>";
    })
    ->addColumn('action', function ($soals) {
      return '<div style="text-align:center"><a href="/elearning/soal/ubah/' . $soals->id . '" class="btn btn-success btn-xs">Ubah</a> <a href="/elearning/soal/detail/' . $soals->id . '" class="btn btn-primary btn-xs">Detail</a></div>';
    })
    ->rawColumns(['jenis', 'action', 'kkm'])->make(true);
}
    public function show($id)
    {
        
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
