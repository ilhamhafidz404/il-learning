<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Completed;
use App\Models\Progress;
use App\Models\Submission;
use App\Models\Submitsubmission;
use Illuminate\Http\Request;

class _SubmitSubmissionController extends Controller
{
  public function __invoke(Request $request)
  {

    // cek apakah ada submit yang sama oleh user yang sama
    $submitSubmmission =
      Submitsubmission::whereUserId($request->user)
      ->whereSubmissionId($request->submission)
      ->whereMissionId($request->mission)
      ->count();

    // cek jika user kirim file (bukan tugas teory)
    if ($request->file) {
      Submitsubmission::create([
        'file' => $request->file('file')->store('uploads'),
        'description' => $request->description,
        'user_id' => $request->user,
        'mission_id' => $request->mission,
        'submission_id' => $request->submission,
        'extension' => $request->file('file')->extension(),
      ]);
      // jika submittugas teory, maka 
    } else {
      if (!$submitSubmmission) {
        Submitsubmission::create([
          'user_id' => $request->user,
          'mission_id' => $request->mission,
          'submission_id' => $request->submission,
        ]);
      }
    }


    // cek apakah ada progres dari user yang login dengan mission dan classroom yang di request (submit)
    $check = Progress::whereUserId($request->user)
      ->whereMissionId($request->mission)
      ->whereClassroomId($request->classroom)
      ->first();

    // jika ada berarti akan melakukan update pada progresnya (tambah progres)
    if ($check) {
      $subCount = Submission::whereMissionId($request->mission)
        ->whereClassroomId($request->classroom)
        ->count();

      if ($check->progress != $subCount && !$submitSubmmission) {
        Progress::find($check->id)->update([
          'progress' => $check->progress + 1,
          'submission_count' => $subCount,
          'classroom_id' => $request->classroom
        ]);
      }
      // jika tidak ada berarti progressnya dibuat terlebih dahulu
    } else {
      Progress::create([
        'progress' => 1,
        'user_id' => $request->user,
        'mission_id' => $request->mission,
        'submission_count' => Submission::whereMissionId($request->mission)
          ->whereClassroomId($request->classroom)
          ->count(),
        'classroom_id' => $request->classroom
      ]);
    }

    // Completed::whereUserId($request->user)->whereSubmissionId($request->submission)->first()->update([
    //   'status' => true
    // ]);


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
