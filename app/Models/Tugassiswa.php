<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tugassiswa extends Model
{
    protected $fillable = [
        'id_tugas',
        'no_induk',
        'nilai',
        'isi',
        'komentar'
    ];

}