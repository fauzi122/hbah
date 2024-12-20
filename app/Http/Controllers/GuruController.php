<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Aktifitas;

class GuruController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    // $this->middleware(['permission:guru.index|guru.create|guru.edit|guru.delete']);

  }

  public function index()
  {
    if (auth()->user()->status == 'G' || auth()->user()->status == 'A') {
      $user = User::where('id', auth()->user()->id)->first();
      return view('guru.index', compact('user'));
    } else {
      return redirect('/home');
    }
  }

  public function dataGuru()
  {
    $gurus = User::where('status', 'G');
    return DataTables::of($gurus)
      ->addColumn('empty_str', function () {
        return '';
      })
      ->editColumn('jk', function ($gurus) {
        if ($gurus->jk == 'L') {
          return "Laki-laki";
        } else {
          return "Perempuan";
        }
      })
      ->addColumn('action', function ($gurus) {
        if (auth()->user()->status == 'G') {
          return '<div style="text-align:center"><a href="guru/detail/' . $gurus->id . '" class="btn btn-xs btn-success">Detail</a></div>';
        } else {
          return '<div style="text-align:center">
                              <a href="guru/ubah/' . $gurus->id . '" class="btn btn-xs btn-primary">Ubah</a>
                              <button type="button" class="btn btn-xs btn-danger del-guru" id=' . $gurus->id . '>Hapus</button>
                              <a href="guru/detail/' . $gurus->id . '" class="btn btn-xs btn-success">Detail</a></div>';
        }
      })
      ->make(true);
  }

  public function detailGuru(Request $request)
  {
    $tanggal = date('d-m-Y');
    if (auth()->user()->status == 'G' or auth()->user()->status == 'A') {
      $user = User::where('id', auth()->user()->id)->first();
      $guru = User::where('id', $request->id)->first();
      $grup_aktifitas = Aktifitas::where('id_user', $request->id)->whereDate('created_at', DB::raw('CURDATE()'))->paginate(5);
      return view('guru.detail', compact('user', 'guru', 'grup_aktifitas', 'tanggal'));
    } else {
     return redirect('/home');
    }
  }

  public function simpanGuru(Request $request)
  {
    $save = new User;
    return $save->simpanGuru($request);
  }

  public function ubahGuru(Request $request)
  {
    if (auth()->user()->status == 'G' or auth()->user()->status == 'A') {
      $user = User::where('id', auth()->user()->id)->first();
      $guru = User::where('id', $request->id)->first();
      return view('guru.form.ubah', compact('user', 'guru'));
    } else {
     return redirect('/home');
    }
  }
  public function update(Request $request, $id)
{
  // dd($id);
    $guru = User::findOrFail($id);
    $guru->nama = $request->nama;
    $guru->no_induk = $request->no_induk;
    $guru->email = $request->email;
    $guru->jk = $request->jk;

    if (!empty($request->password)) {
        $guru->password = Hash::make($request->password);
    }

    $guru->save();

    return redirect()->to('master/guru/detail/' . $guru->id)->with('success', 'Data guru berhasil diupdate.');
}

}
