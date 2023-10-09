<?php

namespace App\Imports;

use App\Models\Users;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Users([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'phone'    => $row['phone'],
            'code'    => $row['code'],
            'password' => Hash::make($row['password']),
        ]);
    }
}
