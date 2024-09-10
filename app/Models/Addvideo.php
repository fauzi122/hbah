<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addvideo extends Model
{
    protected $fillable=
    [
        'id',
        'no_induk',
        'id_kelas',
        'id_mtk',
        'judul',
        'des',
        'link'

    ];
}
