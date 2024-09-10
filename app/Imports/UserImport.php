<?php

namespace App\Imports;

use App\User;
use FontLib\Table\Type\name;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'      => $row[1],
            'no_induk'  => $row[2],
            'email'     => $row[3],
            'password'  => $row[4],
        ]);
    }
}
