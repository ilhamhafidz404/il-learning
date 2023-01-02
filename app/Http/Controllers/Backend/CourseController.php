<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::all();
        return view("backend.course.index", [
            'course' => $course
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
