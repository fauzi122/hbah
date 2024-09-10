<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class infaqulangsantri extends Model
{
    protected $fillable=
    [
        'id_priode',
        'no_induk',
        'nm_santri',
        'jns_bayar',
        'tgl_bayar',
        'nominal',
        'petugas'

    ];
}
