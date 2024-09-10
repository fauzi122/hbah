<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Biodatasiswa extends Model
{
    protected $fillable=
    [
    'nama',
    'nis',
    'jk',
    'nisn',
    'tampat_lahir',
    'tanggal_lahir',
    'nik',
    'agama',
    'alamat',
    'rt',
    'rw',
    'kelurahan',
    'kecamatan',
    'kode_pos',
    'hp',
    'email',
    'skhun',
    'nama_ayah',
    'tahun_lahir_ayah',
    'jenjang_pendidikan_ayah',
    'pekerjaan_ayah',
    'nik_ayah',
    'nama_ibu',
    'tahun_lahir_ibu',
    'jenjang_pendidikan_ibu',
    'pekerjaan_ibu',
    'nik_ibu',
    'rombel',
    'no_peserta_ujian_nasional',
    'no_seri_ijazah',
    'sekolah_asal',
    'anak_ke_berapa',
    'no_kk',
    'berat_badan',
    'tinggi_badan',
    'lingkar_kepala',
    'jumlah_saudara_kandung'
    ];
}
