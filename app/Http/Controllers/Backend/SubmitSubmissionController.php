<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use App\Models\Submitsubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmitSubmissionController extends Controller
{
    public function __invoke(Request $request)
    {
        Submitsubmission::create([
            'file' => $request->file('file')->store('complete_submission'),
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'submission_id' => $request->submission,
        ]);

        // Submission::whereId($request->submission)->update(){

        // }

        return back();
    }
}
