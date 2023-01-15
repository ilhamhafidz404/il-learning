<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Lecturer;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $myCourses = Course::whereHas('user', function ($q) {
            $q->where('user_id', '=', Auth::user()->id);
        })->get();
        return view("backend.course.index", [
            'courses' => $courses,
            'myCourses' => $myCourses,
        ]);
    }
    public function show(Request $request)
    {
        $course = Course::whereSlug($request->slug)->first();
        return view("backend.course.show", [
            'course' => $course
        ]);
    }
}
