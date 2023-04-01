<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Setting;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $courses = Course::count();
        $lecturers = Lecturer::count();
        $students = Student::count();
        $classrooms = Classroom::count();
        $setting = Setting::first();

        $studentData = Student::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        return view(
            'backend.admin.dashboard',
            compact('courses', 'lecturers', 'students', 'classrooms', 'admin', 'studentData', 'setting')
        );
    }
}
