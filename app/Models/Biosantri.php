<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biosantri extends Model
{
    protected $fillable=
    [
  'no_induk',
  'nm_lengkap',
  'nm_panggilan',
  'tempat_lahir',
  'tgl',
  'jk',
  'email',
  'status',
  'kerja',
  'alamat_kerja',
  'pendidikan',
  'no_hp',
  'alamat',
  'nm_ortu',
  'kerja_ortu',
  'alamat_kerja_ortu',
  'pendidikan_ortu',
  'no_hp_ortu',
    ];
}
