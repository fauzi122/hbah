<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addmateri extends Model
{
    //protected $table = "aktifitas";
    protected $fillable=
    [
        'id',
        'no_induk',
        'id_kelas',
        'id_mtk',
        'judul',
        'des',
        'file'

    ];

}
