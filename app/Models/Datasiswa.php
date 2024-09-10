<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datasiswa extends Model
{
    protected $fillable = [
        'id_kelas',
        'nm_siswa',
        'no_induk',
        'nisn',
        'jk',
        'status',
        'status_sekolah',
        'email',
        'password'
    ];
}
