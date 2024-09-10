<?php

namespace App\Imports;

use App\Models\tes;
use Maatwebsite\Excel\Concerns\ToModel;

class TesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new tes([
            'nama' => $row[1],
            'nis' => $row[2], 
            'alamat' => $row[3], 
            'email' => trim(strtolower($row[2])) . '@gmail.com',
            'password' =>bcrypt('123456'), 
        ]);
    }
}
