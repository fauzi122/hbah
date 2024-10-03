<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Facades\Image;

use App\Models\User;
use App\Models\Kelas;

class KelasController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    // $this->middleware(['permission:kelas.create|kelas.edit|kelas.delete']);

  }

  public function index()
  {
    if (Auth::user()->status == 'G' or Auth::user()->status == 'A') {
      $user = User::where('id', Auth::user()->id)->first();
      $gurus = User::whereIn('status', ['G', 'A'])->get();
      return view('kelas.index', compact('user', 'gurus'));
    } else {
     return redirect('/home');
    }
  }
  public function dataKelas()
  {
  
    if (Auth::user()->status == 'G') {
      $kelas = Kelas::with('siswa')
      ->where('id_wali',Auth::user()->id)
      ->get();
      return DataTables::of($kelas)
        ->addColumn('empty_str', function ($kelas) {
          return '';
        })
        ->addColumn('action', function ($kelas) {
          return '<div style="text-align:center"><a href="kelas/detail/' . $kelas->id . '" class="btn btn-xs btn-success">Detail</a></div>';
        })
        ->addColumn('siswa', function ($kelas) {
          if ($kelas) {
            $siswa = User::where('status', 'S')->where('id_kelas', $kelas->id)->count();
            return '<center>' . $siswa . ' siswa</center>';
          } else {
            return '<center>kelas kosong</center>';
          }
        })
        ->addColumn('wali', function ($kelas) {
          if ($kelas->wali) {
            return '<center>' . $kelas->wali->nama . '</center>';
          } else {
            return '<center><label class="label label-danger">tidak ada</label></center>';
          }
        })
        ->rawColumns(['action', 'siswa', 'wali'])
        ->make(true);
    } elseif(Auth::user()->status == 'A') {
      $kelas = Kelas::with('siswa')
     
      ->get();
      return Datatables::of($kelas)
        ->addColumn('empty_str', function ($kelas) {
          return '';
        })
        ->addColumn('action', function ($kelas) {
          return '<div style="text-align:center">
                            <a href="kelas/ubah/' . $kelas->id . '" class="btn btn-xs btn-primary">Ubah</a>
                            <button type="button" class="btn btn-xs btn-danger del-kelas" id=' . $kelas->id . '>Hapus</button>
                            <a href="detail/' . $kelas->id . '" class="btn btn-xs btn-success">Detail</a>
                          </div>';
        })
        ->addColumn('siswa', function ($kelas) {
          if ($kelas) {
            $siswa = User::where('status', 'S')->where('id_kelas', $kelas->id)->count();
            return '<center>' . $siswa . ' siswa</center>';
          } else {
            return '<center>kelas kosong</center>';
          }
        })
        ->addColumn('wali', function ($kelas) {
          if ($kelas->wali) {
            return '<center>' . $kelas->wali->nama . '</center>';
          } else {
            return '<center><label class="label label-danger">tidak ada</label></center>';
          }
        })
        ->rawColumns(['action', 'siswa', 'wali'])
        ->make(true);
    }
  }
  public function detailKelas(Request $request)
  {
    if (Auth::user()->status == 'G' or Auth::user()->status == 'A') {
      $user = User::where('id', Auth::user()->id)->first();
      $kelas = Kelas::where('id', $request->id)->first();
      $jumlah = User::select('id')->where('status_sekolah', 'Y')->where('id_kelas', $request->id)->count();
      return view('kelas.detail', compact('user', 'kelas', 'jumlah'));
    } else {
     return redirect('/home');
    }
  }
  public function ubahKelas($id)
  {
    if (Auth::user()->status == 'G' or Auth::user()->status == 'A') {
      $user = User::where('id', Auth::user()->id)->first();
      $kelas = Kelas::where('id', $id)->first();
      $gurus = User::whereIn('status', ['G', 'A'])->get();
      return view('kelas.form.ubah', compact('user', 'kelas', 'gurus'));
    } else {
     return redirect('/home');
    }
  }
  public function detailKelasSiswa(Request $request)
  {
    $siswas = User::where('status', 'S')->where('status_sekolah', 'Y')->where('id_kelas', $request->id_kelas)->get();
    return Datatables::of($siswas)
      ->editColumn('jk', function ($siswas) {
        if ($siswas->jk == 'L') {
          return 'Laki-laki';
        } else {
          return 'Perempuan';
        }
      })
      ->addColumn('action', function ($siswas) {
        return '<div style="text-align:center"><a href="../../siswa/detail/' . $siswas->id . '" class="btn btn-xs btn-success">Detail</a></div>';
      })
      ->make(true);
  }
}
