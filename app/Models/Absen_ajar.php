<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Absen_ajar extends Model
{
    protected $fillable=
    [
        'no_induk',
        'id_kelas',
        'id_mtk',
        'nm_mtk',
        'ruang',
        'tgl_ajar',
        'hari_ajar',
        'jam_masuk',
        'jam_keluar',
        'pertemuan',
        'brita_acara',
        'file_ajar',
        'komentar',
        'jam_t',


    ];

 

public function cek_jam($where,$jam)
    {
        return $jadwal = DB::table('jadwals')
        ->where('mulai', '<', $jam)
        ->where('selsai', '>', $jam);
        // ->where($where);
        //  dd($jam);
    // ->groupBy($group);
    }

public function cek_bap($where)
    {
        return $jadwal = DB::table('absen_ajars')
        ->where($where);
    }
    public function showMhs($w_showMhs)
    {
        $mhs =DB::table('users as a')
        ->Join('absen_ajars as b', 'a.id_kelas', '=', 'b.id_kelas')
        ->select('a.no_induk AS no_induk',
            DB::raw('UCASE(a.nama) AS nm_mhs'),
            'a.jk',
            'a.id_kelas',
            'a.status',
            'b.pertemuan',
            'b.hari_ajar',
            'b.tgl_ajar',
            'b.id_mtk')
            ->where('a.status', '=', ['S','s'])
            ->where('a.id_kelas', '<>', '')
            ->where($w_showMhs);
            $mhs->get();
            if($mhs->count()>0){
                    foreach($mhs->get() as $i){
                    $h[$i->no_induk]=$i->nm_mhs;
                }
                    return $h;
                }
    }
   

   public function temu_ajar($w_showMhs)
   {
    return $mhs = DB::table('absen_ajars')
    ->select('pertemuan','berita_acara','file_ajar','no_induk')
    ->where($w_showMhs)
    ->orderByDesc('pertemuan')
    ->limit(1)
    ->get();
   }
   public function mhs_hadir($id_kelas,$id_mtk,$pert)
   {

        $mahasiswa = DB::table('absen_siswas')
       ->where([
           'id_kelas'       =>$id_kelas,
           'id_mtk'         =>$id_mtk,
           'pertemuan'      =>$pert,
           'status_hadir'   =>'1'
        
        ]);
       if($mahasiswa->count()>0){
                       foreach($mahasiswa->get() as $i){
                           $h[$i->nim]=$i;
                   }return $h;
               }else{
               return $mahasiswa->get();
               }
   }

   public function jumlah_mhs($id_kelas)
   {
       return $mhs = DB::table('users')
           ->where('status', '=', ['S','s'])
           ->where('id_kelas', '<>', '')
           ->where('id_kelas', $id_kelas)->count();
          
   }

   public function jml_hadir($id_kelas,$id_mtk,$pert)
    {
        $where=['id_kelas'=>$id_kelas,'id_mtk'=>$id_mtk,'pertemuan'=>$pert,'status_hadir'=>'1'];
        return $mahasiswa = DB::table('absen_siswas')
        ->where($where)->count();
    }


    

}
