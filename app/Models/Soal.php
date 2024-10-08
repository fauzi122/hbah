<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
  protected $fillable=
  [
    'id_user',
    'jenis',
    'id_mtk',
    'paket',
    'deskripsi',
    'kkm',
    'waktu',
    'tampil',
    'tgl_ujian',
    'tgl_selsai_ujian',
  ];
  public function dataDateri()
  {
    return $this->belongsTo('App\Models\Materi', 'materi');
  }
  public function user()
  {
    return $this->belongsTo('App\User', 'id_user');
  }
  public function jawab()
  {
    return $this->belongsTo('App\Models\Jawab', 'id_soal');
  }
  public function detailSoal()
  {
    return $this->hasMany('App\Models\Detailsoal', 'id_soal');
  }

  public function detail_soal_essays()
  {
    return $this->hasMany(DetailSoalEssay::class, 'id_soal', 'id');
  }
}
