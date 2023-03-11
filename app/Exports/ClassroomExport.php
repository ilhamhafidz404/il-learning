<?php

namespace App\Exports;

use App\Models\Classroom;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClassroomExport implements FromCollection
{
    public function collection()
    {
        return Classroom::all();
    }
}
