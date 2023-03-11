<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;

class CourseExport implements FromCollection
{
    public function collection()
    {
        return Course::all();
    }
}
