<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Submission;
use App\Models\Submitsubmission;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Session::has('lecturer')) {
            $lecturer = Lecturer::whereEmail(Session::get('email'))->first();

            $courses = Course::whereHas('lecturer', function ($q) {
                $lecturer = Lecturer::whereEmail(Session::get('email'))->first();
                $q->whereLecturerId($lecturer->id);
            })->get();
            return view('backend.dashboard', [
                'courses' => $courses,
                'lecturer' => $lecturer
            ]);
        }
        return view('backend.dashboard', [
            'courses' => Course::all(),
            'submissions' => Submission::whereClassroomId(Auth::user()->classroom_id)->get(),
            'submitSubmissions' => Submitsubmission::whereUserId(Auth::user()->id)->get()
        ]);
    }
}
