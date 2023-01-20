<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mission;
use App\Models\Student;
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
            'student' => Student::whereUserId(Auth::user()->id)->first()
        ]);
    }
    public function show(Request $request)
    {
        $course = Course::whereSlug($request->slug)->first();
        $missions = Mission::whereCourseId($course->id)->get();
        $submitSubmissions = Submitsubmission::whereUserId(Auth::user()->id);
        $student = Student::whereUserId(Auth::user()->id)->first();
        $submissionCount = Submission::whereClassroomId($student->classroom_id)->count();


        return view("backend.oneForAll.course.show", [
            'course' => $course,
            'missions' => $missions,
            'submitSubmissions' => $submitSubmissions,
            'student' => $student,
            'submissionCount' => $submissionCount,
        ]);
    }
}
