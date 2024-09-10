<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $fillable=
    [
        'id',
        'no_induk',
        'id_kelas',
        'id_mtk',
        'judul',
        'des',
        'file',
        'mulai',
        'selsai',

    ];

    public function showMhs($id_kelas)
   {
       
    $mhs = DB::table('users')
    ->where('id_kelas',$id_kelas)->count();
    
    if($mhs>0){
        $mhs = DB::table('users')
        ->where('id_kelas',$id_kelas);
        $mhs->get();
}else{
       
}
if($mhs->count()>0){
    foreach($mhs->get() as $i){
    $h[$i->no_induk]=$i->nama;
}
    return $h;
}
   }


    public function nilai_mhs($id)
   {
    $nilai = DB::table('tugassiswas')
    ->leftJoin('tugas as b', 'tugassiswas.id_tugas', '=', 'b.id')
    ->select('tugassiswas.no_induk AS no_induk',
    'tugassiswas.created_at AS unix_mhs',
    'b.selsai AS unix',
    'tugassiswas.nilai AS nilai',
    'tugassiswas.created_at AS created_at',
    'tugassiswas.isi AS isi',
    'tugassiswas.komentar AS komentar')
    ->where('tugassiswas.id_tugas',$id);
    
    if($nilai->count()>0){
                    foreach($nilai->get() as $i){
                        $h[$i->no_induk]=$i;
                }
                return $h;
            }
            else
            {
            return $nilai->get();
            }
   }
}
