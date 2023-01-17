<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitsubmissionRequest;
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
            'mission_id' => $request->mission,
            'submission_id' => $request->submission,
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Berhasil Meng-upload Tugas',
            'message' => 'Anda sudah meng-upload tugas'
        ]);
    }
}
