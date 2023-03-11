<?php

namespace App\Exports;

use App\Models\Classroom;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ClassroomExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        $classrooms =  Classroom::all();
        return $classrooms;
    }

    public function map($classrooms): array
    {
        return [
            [
                $classrooms->name,
                $classrooms->mentor,
            ],

        ];
    }


    public function headings(): array
    {
        return [
            'Name',
            'Mentor',
        ];
    }
}
