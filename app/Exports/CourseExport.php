<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CourseExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        $courses = Course::all();
        return $courses;
    }

    public function map($courses): array
    {
        return [
            [
                $courses->name,
                $courses->sks,
                $courses->description,
            ],

        ];
    }


    public function headings(): array
    {
        return [
            'Name',
            'SKS',
            'Description',
        ];
    }
}
