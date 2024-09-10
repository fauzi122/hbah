<?php

namespace App\Imports;

use App\Models\Biodatasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;

class BiodatasiswaImport implements ToModel,WithHeadingRow,SkipsOnError
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Biodatasiswa([
            'nama'                      => $row['nama'],
            'nis'                       => $row['nis'],
            'jk'                        => $row['jk'],
            'nisn'                      => $row['nisn'],
            'tampat_lahir'              => $row['tampat_lahir'],
            'tanggal_lahir'             => $row['tanggal_lahir'],
            'nik'                       => $row['nik'],
            'agama'                     => $row['agama'],
            'alamat'                    => $row['alamat'],
            'rt'                        => $row['rt'],
            'rw'                        => $row['rw'],
            'kelurahan'                 => $row['kelurahan'],
            'kecamatan'                 => $row['kecamatan'],
            'kode_pos'                  => $row['kode_pos'],
            'hp'                        => $row['hp'],
            'email'                     => $row['email'],
            'skhun'                     => $row['skhun'],
            'nama_ayah'                 => $row['nama_ayah'],
            'tahun_lahir_ayah'          => $row['tahun_lahir_ayah'],
            'jenjang_pendidikan_ayah'   => $row['jenjang_pendidikan_ayah'],
            'pekerjaan_ayah'            => $row['pekerjaan_ayah'],
            'nik_ayah'                  => $row['nik_ayah'],
            'nama_ibu'                  => $row['nama_ibu'],
            'tahun_lahir_ibu'           => $row['tahun_lahir_ibu'],
            'jenjang_pendidikan_ibu'    => $row['jenjang_pendidikan_ibu'],
            'pekerjaan_ibu'             => $row['pekerjaan_ibu'],
            'nik_ibu'                   => $row['nik_ibu'],
            'rombel'                    => $row['rombel'],
            'no_peserta_ujian_nasional' => $row['no_peserta_ujian_nasional'],
            'no_seri_ijazah'            => $row['no_seri_ijazah'],
            'sekolah_asal'              => $row['sekolah_asal'],
            'anak_ke_berapa'            => $row['anak_ke_berapa'],
            'no_kk'                     => $row['no_kk'],
            'berat_badan'               => $row['berat_badan'],
            'tinggi_badan'              => $row['tinggi_badan'],
            'lingkar_kepala'            => $row['lingkar_kepala'],
            'jumlah_saudara_kandung'    => $row['jumlah_saudara_kandung']
        ]);
    }
  
    public function onError(Throwable $error)
    {
        
    }

}
