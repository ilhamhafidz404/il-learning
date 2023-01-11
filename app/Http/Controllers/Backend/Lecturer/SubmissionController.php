<?php

namespace App\Http\Controllers\Backend\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function store(Request $request)
    {
        Submission::create([
            'name' => $request->name,
            'subtitle' => $request->subtitle,
            'deadline' => $request->deadline,
            'lecturer_id' => $request->lecturer,
            'course_id' => $request->course,
            'classroom_id' => $request->classroom,
        ]);
        return redirect()->back();
    }
}
