<?php

namespace App\Imports;

use App\Models\Kartuuji;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;

class KartuujiImport implements ToModel,WithHeadingRow,SkipsOnError
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kartuuji([
            'no_induk'  => $row['no_induk'],
            'nama'      => $row ['nama'],
            'kls'       => $row ['kls'],
            'status'    => $row ['status'],
        ]);
    }
    public function onError(Throwable $error)
    {
        
    }
}
