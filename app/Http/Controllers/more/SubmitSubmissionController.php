<?php

namespace App\Http\Controllers\more;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitsubmissionRequest;
use App\Models\Completed;
use App\Models\Progress;
use App\Models\Submission;
use App\Models\Submitsubmission;
use Illuminate\Support\Facades\Auth;

class SubmitSubmissionController extends Controller
{
    public function __invoke(SubmitsubmissionRequest $request)
    {
        // cek apakah ada submit yang sama oleh user yang sama
        $submitSubmmission =
            Submitsubmission::whereUserId(Auth::user()->id)
            ->whereSubmissionId($request->submission)
            ->whereMissionId($request->mission)
            ->count();

        if ($request->file) {
            Submitsubmission::create([
                'file' => $request->file('file')->store('complete_submission'),
                'description' => $request->description,
                'user_id' => Auth::user()->id,
                'mission_id' => $request->mission,
                'submission_id' => $request->submission,
                'extension' => $request->file('file')->extension(),
            ]);
        } else {
            if (!$submitSubmmission) {
                Submitsubmission::create([
                    'user_id' => Auth::user()->id,
                    'mission_id' => $request->mission,
                    'submission_id' => $request->submission,
                ]);
            }
        }

        $check = Progress::whereUserId(Auth::user()->id)->whereMission_id($request->mission)->first();
        if ($check) {
            $subCount = Submission::whereMissionId($request->mission)->count();
            if ($check->progress != $subCount && !$submitSubmmission) {
                Progress::find($check->id)->update([
                    'progress' => $check->progress + 1,
                    'submission_count' => $subCount,
                ]);
            }
        } else {
            Progress::create([
                'progress' => 1,
                'user_id' => Auth::user()->id,
                'mission_id' => $request->mission,
                'submission_count' => Submission::whereMissionId($request->mission)->count(),
            ]);
        }

        Completed::whereUserId(Auth::user()->id)->whereSubmissionId($request->submission)->first()->update([
            'status' => true
        ]);


        if ($request->file) {
            return redirect()->back()->with([
                'success' => true,
                'title' => 'Submission upload successfully',
                'message' => 'You have uploaded the file for this Submission'
            ]);
        } else {
            $submission = Submission::whereId($request->submission)->first();

            return response()->download(storage_path('app/public/' . $submission->theory));
        }
    }
}
