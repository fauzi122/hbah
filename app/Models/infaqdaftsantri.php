<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class infaqdaftsantri extends Model
{
    protected $table = 'infakdaftarsantris';
    protected $fillable=
    [
        'id_daftar',
        'id_priode',
        'id_level',
        'jns_bayar',
        'nm_santri',
        'nominal',
        'tgl_bayar',
        'petugas'

    ];
}
