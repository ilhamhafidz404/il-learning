<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mission;
use App\Models\Submission;
use App\Models\Submitsubmission;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $myCourses = Course::whereHas('user', function ($q) {
            $q->where('user_id', '=', Auth::user()->id);
        })->get();
        return view("backend.oneForAll.course.index", [
            'courses' => $courses,
            'myCourses' => $myCourses,
        ]);
    }
    public function show(Request $request)
    {
        $course = Course::whereSlug($request->slug)->first();
        $missions = Mission::whereCourseId($course->id)->get();
        $submitSubmissions = Submitsubmission::whereUserId(Auth::user()->id);
        return view("backend.oneForAll.course.show", [
            'course' => $course,
            'missions' => $missions,
            'submitSubmissions' => $submitSubmissions,
            'submissionCount' => Submission::whereClassroomId(Auth::user()->classroom_id)->count()
        ]);
    }
}
