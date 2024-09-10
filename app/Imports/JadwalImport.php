<?php

namespace App\Imports;
use App\Models\Jadwal;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;


class JadwalImport implements ToModel,WithHeadingRow,SkipsOnError
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jadwal([
            'no_induk'      => $row['no_induk'],
            'id_kelas'      => $row['id_kelas'],
            'id_mtk'        => $row['id_mtk'],
            'nm_mtk'        => $row['nm_mtk'],
            'hari'          => $row['hari'], 
            'mulai'         => $row['mulai'], 
            'selsai'        => $row['selsai'], 
            'ruang'         => $row['ruang'], 
            'jam_t'         =>$row['mulai'].'-'.$row['selsai'], 
          
            

        ]);
    }
    
    public function onError(Throwable $error)
    {
        
    }

}
