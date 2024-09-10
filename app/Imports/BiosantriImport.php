<?php

namespace App\Imports;

use App\Models\Biosantri;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;

class BiosantriImport implements ToModel,WithHeadingRow,SkipsOnError
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Biosantri([
            
                'no_induk'              => $row['no_induk'],
                'nm_lengkap'            => $row['nm_lengkap'],
                'nm_panggilan'          => $row['nm_panggilan'],
                'tempat_lahir'          => $row['tempat_lahir'],
                'tgl'                   => $row['tgl'],
                'jk'                    => $row['jk'],
                'email'                 => $row['email'],
                'status'                => $row['status'],
                'kerja'                 => $row['kerja'],
                'alamat_kerja'          => $row['alamat_kerja'],
                'pendidikan'            => $row['pendidikan'],
                'no_hp'                 => $row['no_hp'],
                'alamat'                => $row['alamat'],
                'nm_ortu'               => $row['nm_ortu'],
                'kerja_ortu'            => $row['kerja_ortu'],
                'alamat_kerja_ortu'     => $row['alamat_kerja_ortu'],
                'pendidikan_ortu'       => $row['pendidikan_ortu'],
                'no_hp_ortu'            => $row['no_hp_ortu']
              
            
        ]);
    }

    public function onError(Throwable $error)
    {
        
    }
}
