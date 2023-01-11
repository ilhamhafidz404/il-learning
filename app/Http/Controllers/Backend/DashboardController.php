<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
        ]);
    }
}
