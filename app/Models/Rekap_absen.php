<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rekap_absen extends Model
{
 
    public function get_editrekap_teori($w_cektemu)
    {
        return $jadwal = DB::table('absen_ajars')
        ->where($w_cektemu);
    }

    public function get_rekapabsen_mhs_ext($w_rekapmhs)
    {
        return $jadwal = DB::table('absen_siswas as a')
        ->leftJoin('users as b', 'a.nis', '=', 'b.no_induk')
        ->where($w_rekapmhs)
        ->groupBy('a.nis','a.id_mtk')
        ->select('a.nip','a.nis AS nis','a.id_mtk AS id_mtk',
        'b.nama AS nm_siswa','a.id_kelas AS id_kelas',
     
        DB::raw("CONCAT(
            '{',
            GROUP_CONCAT(
              CONCAT(
                '\"P',
                a.pertemuan,
                '\":',
                a.status_hadir
              ) SEPARATOR ','
            ),
            '}'
          ) AS rwyhadir"),
        DB::raw('SUM(IF(a.status_hadir = 1, 1, 0)) AS jml_hadir'),
        DB::raw('SUM(IF(a.status_hadir = 0, 1, 0)) AS jml_absen'),
        DB::raw('MAX(a.pertemuan) AS totalpertemuan'),
        DB::raw('SUM(IF(a.status_hadir = 1, 1, 0)) * 100 / MAX(a.pertemuan) AS prosentase')
        )->get();
        // dd($jadwal);
    }
    
    public function get_mtk($kdmtk)
    {
        return $jadwal = DB::table('mapels')
        ->where('id_mtk', '=', $kdmtk)->get();
    }
}
