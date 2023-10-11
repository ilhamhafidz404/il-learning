<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Mission;
use App\Models\Progress;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index()
    {
        $courses = Course::with("program")->get();
        return response()->json($courses);
    }
    public function show($slug)
    {
        $course = Course::whereSlug($slug)->first();
        $missions = Mission::with('submission')->whereCourseId($course->id)->get();
        return response()->json([
            "course" => $course,
            "missions" => $missions,
        ]);
    }
}
