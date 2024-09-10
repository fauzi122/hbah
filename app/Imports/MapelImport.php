<?php

namespace App\Imports;

use App\Models\Mapel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;

class MapelImport implements ToModel,WithHeadingRow,SkipsOnError
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mapel([
            'id'       => $row['id'],
            'judul'    => $row['judul'],
            'status'   => $row['status'],
        ]);
    }

    public function onError(Throwable $error)
    {
        
    }
}
