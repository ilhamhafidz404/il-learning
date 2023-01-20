<?php

namespace App\Http\Controllers\more;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function __invoke(Request $request)
    {
        $acceptCourse = Course::whereHas('user', function ($q) {
            $q->where('user_id', '=', Auth::user()->id);
        })->get();

        if (Auth::user()->hasRole('student')) {
            $user = Student::whereUserId(Auth::user()->id)->first();
        } else {
            $user = Lecturer::whereUserId(Auth::user()->id)->first();
        }

        return view('Backend.oneForAll.account.index', compact('acceptCourse', 'user'));
    }
}
