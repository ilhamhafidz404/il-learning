<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MissionController extends Controller
{
    public function index()
    {
        $missions = Mission::all();

        return response()->json($missions);
    }

    public function show($slug)
    {
        $mission = Mission::whereSlug($slug)->with('course')->first();
        $submissions = Submission::whereMissionId($mission->id)->with('classroom')->get();

        return response()->json([
            "mission" => $mission,
            "submissions" => $submissions
        ]);
    }

    public function store(Request $request)
    {
        Mission::create([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
            "course_id" => $request->courseId,
        ]);

        return response()->json([
            "code" => "IL-01",
            "message" => "Add Mission Successfully",
        ]);
    }

    public function update(Request $request, $slug)
    {
        $mission = Mission::whereSlug($slug)->first();
        $mission->update([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
        ]);

        return response()->json([
            "code" => "IL-01",
            "message" => "Update Mission Successfully",
        ]);
    }

    public function destroy($id)
    {
        Mission::find($id)->delete();

        return response()->json([
            "code" => "IL-01",
            "message" => "Delete Mission Successfully",
        ]);
    }
}
