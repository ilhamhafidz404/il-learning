<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        if (Auth::user()->hasRole('student')) {
            $user = Student::whereUserId(Auth::user()->id)->first();
        } else {
            $user = Lecturer::whereUserId(Auth::user()->id)->first();
        }
        return view('backend.oneForAll.classroom.index', compact('classrooms', 'user'));
    }

    public function show($slug)
    {
        $classroom = Classroom::whereSlug($slug)->first();
        $student =  Student::whereClassroomId($classroom->id)->get();
        if (Auth::user()->hasRole('student')) {
            $user = Student::whereUserId(Auth::user()->id)->first();
        } else {
            $user = Lecturer::whereUserId(Auth::user()->id)->first();
        }

        return view('backend.oneForAll.classroom.show', compact('classroom', 'user', 'student'));
    }
}
