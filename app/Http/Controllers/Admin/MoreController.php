<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManyToMany\CourseLecturer;
use Illuminate\Http\Request;

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
}
