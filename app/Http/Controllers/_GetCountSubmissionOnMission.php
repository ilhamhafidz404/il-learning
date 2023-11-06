<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class _GetCountSubmissionOnMission extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $submissionCount = Submission::whereMissionId($_GET["missionId"])->whereClassroomId($_GET["classroomId"])->count();

        return response()->json($submissionCount);
    }
}
