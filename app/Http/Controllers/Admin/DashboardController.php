<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $courses = Course::count();
        $lecturers = Lecturer::count();
        $students = Student::count();
        $classrooms = Classroom::count();

        return view('backend.admin.dashboard', compact('courses', 'lecturers', 'students', 'classrooms'));
    }
}
