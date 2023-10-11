<?php

namespace App\Http\Controllers;

use App\Models\Submitsubmission;
use Illuminate\Http\Request;

class SubmitsubmissionController extends Controller
{
    public function show($userId)
    {
        $submitSubmission =
            Submitsubmission::whereUserId($userId)
            ->whereMissionId($_GET["mission"])
            ->whereSubmissionId($_GET["submission"])
            ->first();

        if ($submitSubmission) {
            return response()->json([
                "code" => "IL-HAS",
                "message" => "have been collected",
                "submitSubmission" => $submitSubmission
            ]);
        }

        return response()->json([
            "code" => "IL-NOT-HAS",
            "message" => "haven't collected "
        ]);
    }
}
