<?php

namespace App\Http\Controllers\more;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitsubmissionRequest;
use App\Models\Completed;
use App\Models\Progres;
use App\Models\Progress;
use App\Models\Submission;
use App\Models\Submitsubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmitSubmissionController extends Controller
{
    public function __invoke(SubmitsubmissionRequest $request)
    {
        Submitsubmission::create([
            'file' => $request->file('file')->store('complete_submission'),
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'mission_id' => $request->mission,
            'submission_id' => $request->submission,
            'extension' => $request->file('file')->extension(),
        ]);


        $check = Progress::whereUserId(Auth::user()->id)->whereMission_id($request->mission)->first();
        if ($check) {
            Progress::find($check->id)->update([
                'progress' => $check->progress + 1,
                'submission_count' => Submission::whereMissionId($request->mission)->count(),
            ]);
        } else {
            Progress::create([
                'progress' => 1,
                'user_id' => Auth::user()->id,
                'mission_id' => $request->mission,
                'submission_count' => Submission::whereMissionId($request->mission)->count(),
            ]);
        }

        Completed::whereUserId(Auth::user()->id)->whereSubmissionId($request->submission)->update([
            'status' => true
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Berhasil Meng-upload Tugas',
            'message' => 'Anda sudah meng-upload tugas'
        ]);
    }
}
