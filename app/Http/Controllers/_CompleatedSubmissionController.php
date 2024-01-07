<?php

namespace App\Http\Controllers;

use App\Models\Completed;
use Illuminate\Http\Request;

class _CompleatedSubmissionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $uncompleteds = Completed::whereUserId($request->userId)->whereStatus(0)->with("submission.mission.course")->get();

        return response()->json($uncompleteds);
    }
}
