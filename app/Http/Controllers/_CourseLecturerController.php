<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class _CourseLecturerController extends Controller
{

    public function __invoke($lecturerId)
    {
        $courses = Lecturer::whereId($lecturerId)->with("course")->first();
        return response()->json([
            "courses" => $courses->course
        ]);
    }
}
