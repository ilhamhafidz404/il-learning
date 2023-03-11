<?php

namespace App\Exports;

use App\Models\Lecturer;
use Maatwebsite\Excel\Concerns\FromCollection;

class LecturerExport implements FromCollection
{
    public function collection()
    {
        return Lecturer::all();
    }
}
