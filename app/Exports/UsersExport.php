<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select("id", "name", "type","email", "phone", "code", "password")->get();
    }

    public function headings(): array
    {
        return ["ID", "Name", "Type", "Email", "Phone", "Code","Password"];
    }
}
