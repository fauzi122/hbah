<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Rekap_absenController extends Controller
{
    public function __controller()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $w_cektemu=['id_kelas'=>$request->id_kelas,'id_mtk'=>$request->id_mtk];
        $w_rekapmhs=['a.id_kelas'=>$request->id_kelas,'a.id_mtk'=>$request->id_mtk];
       
        $cektemu = app('App\Models\Rekap_absen')->get_editrekap_teori($w_cektemu)->get();
        $rekapmhs = app('App\Models\Rekap_absen')->get_rekapabsen_mhs_ext($w_rekapmhs);
        $mtk = app('App\Models\Rekap_absen')->get_mtk($request->id_mtk);

        $id_kelas=$request->id_kelas;
        return view('admin.rekap_absen.rekap_absen',compact('cektemu','rekapmhs','mtk','id_kelas'));

      
        return view('guru.absen.index',compact('jadwal'));
    }
}
