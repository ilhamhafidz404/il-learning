<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Completed;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Submission;
use App\Models\Submitsubmission;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('student')) {
            $user = Student::whereUserId(Auth::user()->id)->first();
            $courses = Course::all();
        } else {
            $user = Lecturer::whereUserId(Auth::user()->id)->first();
            $courses = Course::whereHas('lecturer', function ($q) {
                $lecturer = Lecturer::whereUserId(Auth::user()->id)->first();
                $q->whereLecturerId($lecturer->id);
            })->get();
        }

        $doesntCompletes = Completed::whereUserId(Auth::user()->id)->whereStatus(false)->get();

        return view('backend.dashboard', compact('user', 'courses', 'doesntCompletes'), [
            'submissions' => Submission::whereClassroomId($user->classroom_id)->get(),
            'submitSubmissions' => Submitsubmission::whereUserId(Auth::user()->id)->get(),
        ]);
    }
}
