<?php

namespace App\Imports;


use App\Models\Datasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;

class DatasiswaImport implements ToModel,WithHeadingRow,SkipsOnError
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Datasiswa([
            'id_kelas'      => $row['id_kelas'],
            'nm_siswa'      => $row['nm_siswa'],
            'no_induk'      => $row['no_induk'],
            // 'nisn'          => $row['nisn'],
            'jk'            => $row['jk'], 
            'status'        => ('S'), 
            'status_sekolah'=> ('Y'), 
            'email'         => trim(strtolower($row['no_induk'])) . '@gmail.com', 
            'password'      => bcrypt('123456'), 
        ]);
    }
    public function onError(Throwable $error)
    {
        
    }
}
