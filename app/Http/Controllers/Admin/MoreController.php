<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ManyToMany\ClassroomLecturer;
use App\Models\ManyToMany\CourseLecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MoreController extends Controller
{
    public function addCourseToLecturer(Request $request)
    {
        CourseLecturer::create([
            'course_id' => $request->course,
            'lecturer_id' => $request->lecturer,
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => "Behasil Menambah Course untuk Lecturer",
            'message' => "Course untuk Lecturer sudah ditambahkan"
        ]);
    }

    public function addClassroomToLecturer(Request $request)
    {
        ClassroomLecturer::create([
            'classroom_id' => $request->classroom,
            'lecturer_id' => $request->lecturer,
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => "Behasil Menambah Classroom untuk Lecturer",
            'message' => "Classroom untuk Lecturer sudah ditambahkan"
        ]);
    }

    public function changeThemeMode()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $mode = 'light';

        if ($admin->mode == 'light') {
            $mode = 'dark';
        }
        $admin->update([
            'mode' => $mode,
        ]);

        return back();
    }
}
