<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Priodedaftaranak extends Model
{
    protected $fillable=
    [
        'priode',
        'tgl_awal',
        'tgl_akhir',
        'ket',
        'no_induk'

    ];
}
