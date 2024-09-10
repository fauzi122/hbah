<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formulir_dewasa extends Model
{
    protected $fillable=
    [
        'id_priode',
        'id_level',
        'nm_lengkap',
        'nm_panggilan',
        'tempat_lahir',
        'tgl',
        'jk',
        'email',
        'alamat',
        'status',
        'kerja',
        'alamat_kerja',
        'pendidikan',
        'no_hp'

    ];
}
