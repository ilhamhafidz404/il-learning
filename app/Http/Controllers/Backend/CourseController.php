<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
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

        if (Auth::user()->hasRole('student')) {
            $user = Student::whereUserId(Auth::user()->id)->first();
        } else {
            $user = Lecturer::whereUserId(Auth::user()->id)->first();
        }

        return view("backend.oneForAll.course.index", [
            'courses' => $courses,
            'myCourses' => $myCourses,
            'user' => $user
        ]);
    }
    public function show(Request $request)
    {
        $course = Course::whereSlug($request->slug)->first();
        $missions = Mission::whereCourseId($course->id)->get();
        $submitSubmissions = Submitsubmission::whereUserId(Auth::user()->id);

        if (Auth::user()->hasRole('student')) {
            $user = Student::whereUserId(Auth::user()->id)->first();
        } else {
            $user = Lecturer::whereUserId(Auth::user()->id)->first();
        }
        $submissionCount = Submission::whereClassroomId($user->classroom_id);


        return view(
            "backend.oneForAll.course.show",
            compact('course', 'missions', 'submitSubmissions', 'user', 'submissionCount')
        );
    }
}
