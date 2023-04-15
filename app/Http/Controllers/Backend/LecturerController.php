<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function __invoke()
    {
        return view('backend.oneForAll.lecturer.index', [
            'lecturers' => Lecturer::all(),
            'user' => Student::whereUserId(Auth::user()->id)->first()
        ]);
    }
}
