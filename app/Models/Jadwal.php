<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class Jadwal extends Model
{
    // protected $primaryKey = 'no_induk';
    protected $guarded=[];
    protected $fillable = [
        'no_induk',
        'id_kelas',
        'id_mtk',
        'nm_mtk',
        'hari',
        'mulai',
        'selsai',
        'ruang',
        'jam_t',
    ];

    public function jadwal_mengajar()
    {
        
    }
}