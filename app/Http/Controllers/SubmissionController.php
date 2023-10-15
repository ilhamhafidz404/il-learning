<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Mission;
use App\Models\Progress;
use App\Models\Submission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request)
    {

        $deadline = $request->deadlineDate . ' ' . $request->deadlineTime . ':00';
        $mission = Mission::find($request->mission);

        Submission::create([
            'name' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::slug($mission->name) . '_' . $request->classroom,
            'description' => $request->description,
            'deadline' => $deadline,
            'mission_id' => $request->mission,
            'lecturer_id' => $request->lecturer,
            'course_id' => $mission->course_id,
            'classroom_id' => $request->classroom,
        ]);

        $progresses = Progress::whereMissionId($request->mission)->whereClassroomId($request->classroom)->get();
        if ($progresses->count() > 0) {
            foreach ($progresses as $progress) {
                $progress->update([
                    'submission_count' => $progress->submission_count + 1
                ]);
            }
        }

        return response()->json([
            "code" => "IL-01",
            "message" => "Add Submission Successfully",
            "progress" => $progresses
        ]);
    }

    public function show($slug)
    {
        $submission = Submission::whereSlug($slug)->with("mission")->first();

        return response()->json($submission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $submission = Submission::whereSlug($slug)->first();

        $deadline = $request->deadlineDate . ' ' . $request->deadlineTime;
        $mission = Mission::find($request->mission);

        $submission->update([
            'name' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::slug($mission->name) . '_' . $request->classroom,
            'description' => $request->description,
            'deadline' => $deadline,
            'mission_id' => $request->mission,
            'lecturer_id' => $request->lecturer,
            'course_id' => $mission->course_id,
            'classroom_id' => $request->classroom,
        ]);

        return response()->json([
            "code" => "IL-01",
            "message" => "Update Submission Successfully",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Submission::find($id)->delete();

        return response()->json([
            "code" => "IL-01",
            "message" => "Delete Submission Successfully",
        ]);
    }
}
