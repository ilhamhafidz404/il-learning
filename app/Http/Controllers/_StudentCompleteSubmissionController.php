<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Submission;
use App\Models\Submitsubmission;
use Illuminate\Http\Request;

class _StudentCompleteSubmissionController extends Controller
{
    public function __invoke($submissionSlug)
    {
        $submission = Submission::whereSlug($submissionSlug)->with("mission")->first();

        // $lecturer = Lecturer::whereUserId($_GET["lecturer"])->first();
        $submitSubmissions = Submitsubmission::whereSubmissionId($submission->id)->with("user", "submission")->get();
        $studentCount = Student::whereClassroomId($submission->classroom_id)->count();

        return response()->json([
            'submission' => $submission,
            'submitSubmissions' => $submitSubmissions,
            'studentCount' => $studentCount
        ]);
    }
}
