<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        $studens = Student::with('user', 'classroom')->get();
        return $studens;
    }

    public function map($students): array
    {
        return [
            [
                $students->nim,
                $students->user->name,
                $students->gender,
                $students->classroom->name,
                $students->user->email,
            ],

        ];
    }


    public function headings(): array
    {
        return [
            'NIM',
            'Name',
            'Gender',
            'Classroom',
            'Email',
        ];
    }
}
