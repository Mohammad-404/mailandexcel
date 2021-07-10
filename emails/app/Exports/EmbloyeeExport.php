<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmbloyeeExport implements FromCollection,WithHeadings
{

    public function headings():array{
        return [
            'id',
            'name',
            'email',
            'startdate',
            'enddate',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(User::getEmployee());
    }
}
