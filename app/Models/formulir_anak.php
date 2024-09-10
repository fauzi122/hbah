<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formulir_anak extends Model
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
        'nm_ortu',
        'kerja_ortu',
        'alamat_kerja_ortu',
        'pendidikan_ortu',
        'no_hp_ortu'

    ];
}
