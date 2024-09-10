<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sambutan extends Model
{
    protected $fillable = [
        'foto',
        'no_induk',
        'nm_kep',
        'des'
    ];
}
