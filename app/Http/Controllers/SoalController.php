<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use Illuminate\Support\Facades\DB;

use Spreadsheet_Excel_Reader;
use Excel;

use App\User;
use App\Models\Soal;
use App\Models\Mapel;
use App\Models\Detailsoal;
use App\Models\Kelas;
use App\Models\Aktifitas;
use App\Models\Distribusisoal;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
// use Illuminate\Support\Facades\Input;
use Yajra\DataTables\Facades\DataTables;

class SoalController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware(['permission:soal_uts.index|soal_uts.create|soal_uts.edit|soal_uts.detail']);

  }

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
    return view('soal.index', compact('user', 'soals'));
  } else {
    return redirect('/home');
  }

}
public function uas()
{

  if (Auth::user()->status == 'G' or Auth::user()->status == 'A') {
    $user = User::where('id', Auth::user()->id)->first();

    if (Auth::user()->status == 'G') {
      $soals = Soal::where('id_user', Auth::user()->id)->paginate(5);
    } elseif (Auth::user()->status == 'A') {
      $soals = Soal::orderBy('id', 'DESC')->paginate(5);
    }
    // $materis = Materi::where('id_user', Auth::user()->id)->get();
    return view('soal.uas', compact('user', 'soals'));
  } else {
    return redirect('/home');
  }

}

public function dataSoaluas()
{
  if (Auth::user()->status == 'G') {
    $soals = DB::table('soals')
    ->join('mapels', 'soals.id_mtk', '=', 'mapels.id_mtk')
    ->select('soals.*', 'mapels.id_mtk','mapels.nm_mtk')
    ->where('jenis', 1)
    ->where('paket', 'UAS')
    ->where('id_user', Auth::user()->id)->get();

  } elseif (Auth::user()->status == 'A') {
    $soals = DB::table('soals')
    ->join('mapels', 'soals.id_mtk', '=', 'mapels.id_mtk')
    ->select('soals.*', 'mapels.id_mtk','mapels.nm_mtk')
    ->where('jenis', 1)
    ->where('paket', 'UAS')
    ->get();
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
  public function dataSoal()
  {
    if (Auth::user()->status == 'G') {
      $soals = DB::table('soals')
      ->join('mapels', 'soals.id_mtk', '=', 'mapels.id_mtk')
      ->select('soals.*', 'mapels.id_mtk','mapels.nm_mtk')
      ->where('jenis', 1)
      ->where('paket', 'UTS')
      ->where('id_user', Auth::user()->id)->get();

    } elseif (Auth::user()->status == 'A') {
      $soals = DB::table('soals')
      ->join('mapels', 'soals.id_mtk', '=', 'mapels.id_mtk')
      ->select('soals.*', 'mapels.id_mtk','mapels.nm_mtk')
      ->where('jenis', 1)
      ->where('paket', 'UTS')
      ->get();
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
        return '<div style="text-align:center"><a href="soal/ubah/' . $soals->id . '" class="btn btn-success btn-xs">Ubah</a> <a href="soal/detail/' . $soals->id . '" class="btn btn-primary btn-xs">Detail</a></div>';
      })
      ->rawColumns(['jenis', 'action', 'kkm'])->make(true);
  }

  public function detail(Request $request)
  {
    if (Auth::user()->status == 'G' or Auth::user()->status == 'A') {
      $id_soal = $request->id;
      $user = User::where('id', Auth::user()->id)->first();
      $soal = Soal::where('id', $request->id)->first();
      // dd($soal);
      $soals = Detailsoal::where('id_soal', $request->id)->get();
      $cekDistribusisoal = Distribusisoal::get();
      if (count($cekDistribusisoal) > 0) {
        $kelas = Kelas::leftjoin('distribusisoals', 'kelas.id', '=', 'distribusisoals.id_kelas')
          ->select('distribusisoals.id_soal', 'kelas.*')
          ->orderBy('kelas.id', 'ASC')
          ->groupBy('kelas.id')
          ->get();
      } else {
        $kelas = Kelas::get();
      }
       return view('soal.detail', compact('user', 'soal', 'soals', 'kelas', 'id_soal'));
    } else {
      return redirect('/home');
    }
  }
  public function dataDetailSoal(Request $request)
  {
    // return Input::get('id');
    $soals = Detailsoal::where('id_soal', 
    $request->get('id'));
    return DataTables::of($soals)
      ->editColumn('status', function ($soals) {
        if ($soals->status == 'Y') {
          return "<center><span class='label label-success'>Tampil</span></center>";
        } else {
          return "<center><span class='label label-danger'>Tidak tampil</span></center>";
        }
      })
      ->editColumn('kunci', function ($soals) {
        return '<center>' . $soals->kunci . '</center>';
      })
      ->editColumn('score', function ($soals) {
        return '<center>' . $soals->score . '</center>';
      })
      ->addColumn('action', function ($soals) {
        return '<div style="text-align:center"><a href="ubah/' . $soals->id . '" class="btn btn-success btn-xs">Ubah</a> <a href="data-soal/' . $soals->id . '" class="btn btn-primary btn-xs">Detail</a></div>';
      })
      ->rawColumns(['soal', 'kunci', 'score', 'action', 'status'])
      ->make(true);
  }

  public function ubahSoal(Request $request)
  {
    if (Auth::user()->status == 'G' or Auth::user()->status == 'A') {
      $soal = Soal::where('id', $request->id)->first();
      $user = User::where('id', Auth::user()->id)->first();
      // $materis = Materi::where('id_user', Auth::user()->id)->get();
      $materis = Mapel::get();
      return view('guru.soal.form.ubah', compact('user', 'soal','materis'));
    } else {
      return redirect('/home');
    }
  }

  public function create_uts()
  {
    $materis = Mapel::get();
    return view('soal.create_uts',compact('materis'));
  }

  public function create_uas()
  {
    $materis = Mapel::get();
    return view('soal.create_uas',compact('materis'));
  }
  // for crud
  public function simpanSoal(Request $request)
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
  return redirect('/elearning/soal')->with(['success' => 'Data Berhasil Disimpan!']);
  }else{
      return redirect('/elearning/soal')->with(['error' => 'Data Gagal Disimpan!']);
    }

}

public function simpanSoaluas(Request $request)
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
return redirect('/elearning/soal/uas')->with(['success' => 'Data Berhasil Disimpan!']);
}else{
    return redirect('/elearning/soal/uas')->with(['error' => 'Data Gagal Disimpan!']);
  }

}

 public function updateSoal(Request $request)
  {
 
    if ($request['deskripsi'] == "") {
      return "Deskripsi tidak boleh kosong.";
    } elseif ($request['waktu'] == "") {
      return "Waktu tidak boleh kosong.";
    } elseif ($request['tgl_ujian'] == "") {
      return "Tanggal Ujian tidak boleh kosong.";
    } elseif ($request['jam_mulai_ujian'] == "") {
      return "jam Ujian tidak boleh kosong.";
    } elseif ($request['tgl_selsai_ujian'] == "") {
      return "tgl selsai Ujian tidak boleh kosong.";
    } elseif ($request['jam_selsai_ujian'] == "") {
      return "tgl selsai Ujian tidak boleh kosong.";
    } else {
    
      if ($request['id'] == 'N') {
        $query = new Soal;
        $query->id_user = Auth::user()->id;
      } else {
        $query = Soal::where('id', $request['id'])->first();
      }
      $query->jenis             = $request['jenis'];
      $query->id_mtk            = $request['id_mtk'];
      $query->paket             = $request['paket'];
      $query->deskripsi         = $request['deskripsi'];
      $query->kkm               = $request['kkm'];
      $query->waktu             = $request['waktu'];
      $query->tgl_ujian         = $request['tgl_ujian'].' '.$request['jam_mulai_ujian'];
      $query->tgl_selsai_ujian  = $request['tgl_selsai_ujian'].' '.$request['jam_selsai_ujian'];
      
      $query->save();
      return 'ok';
    }
  }
  public function simpanDetailSoal(Request $request)
  {
    if ($request->soal == "") {
      return "Soal tidak boleh kosong.";
    } elseif ($request->kunci == "") {
      return "Kunci jawaban soal tidak boleh kosong.";
    } elseif ($request->score == "") {
      return "Score soal tidak boleh kosong.";
    } elseif ($request->status == "") {
      return "Status soal tidak boleh kosong.";
    } else {
      if ($request->id == 'N') {
        $query = new Detailsoal;
        $query->id_soal = $request->id_soal;
        $query->jenis = 1;
        $query->id_user = Auth::user()->id;
        $query->sesi = $request->sesi;
      } else {
        $query = Detailsoal::where('id', $request->id)->first();
      }
      $query->soal = $request->soal;
      $query->pila = $request->pila;
      $query->pilb = $request->pilb;
      $query->pilc = $request->pilc;
      $query->pild = $request->pild;
      $query->pile = $request->pile;
      $query->kunci = $request->kunci;
      $query->score = $request->score;
      $query->status = $request->status;
      $query->save();
      return 'ok';
    }
  }
  public function ubahDetailSoal(Request $request)
  {
    if (Auth::user()->status == 'G' or Auth::user()->status == 'A') {
      $id_soal = $request->id;
      $user = User::where('id', Auth::user()->id)->first();
      $soal = Detailsoal::where('id', $request->id)->first();
      return view('soal.form.ubah', compact('user', 'soal', 'id_soal'));
    } else {
      return redirect('/home');
    }
  }
  public function detailDataSoal(Request $request)
  {
    if (Auth::user()->status == 'G' or Auth::user()->status == 'A') {
      $id_soal = $request->id;
      $user = User::where('id', Auth::user()->id)->first();
      $soal = Detailsoal::where('id', $request->id)->first();
      return view('soal.detailSoal', compact('user', 'soal', 'id_soal'));
    } else {
      return redirect('/home');
    }
  }

  public function saveEssay(Request $request)
  {
    return $request;
  }
}
