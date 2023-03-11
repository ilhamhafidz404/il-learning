<?php

namespace App\Exports;

use App\Models\Lecturer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LecturerExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        $lecturers =  Lecturer::with('user')->get();
        return $lecturers;
    }


    public function map($lecturers): array
    {
        return [
            [
                $lecturers->nip,
                $lecturers->user->name,
                $lecturers->gender,
                $lecturers->user->email,
            ],

        ];
    }


    public function headings(): array
    {
        return [
            'NIP',
            'Name',
            'Gender',
            'Email',
        ];
    }
}
