<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ClassroomExport;
use App\Exports\CourseExport;
use App\Exports\LecturerExport;
use App\Exports\StudentExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function exportLecturer()
    {
        return Excel::download(new LecturerExport, 'lecturers.xlsx');
    }

    public function exportStudent()
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }

    public function exportCourse()
    {
        return Excel::download(new CourseExport, 'courses.xlsx');
    }

    public function exportClassroom()
    {
        return Excel::download(new ClassroomExport, 'classrooms.xlsx');
    }
}
