<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Submission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    // public function index()
    // {
    //     $missions = Missions
    //     return "halo";
    // }

    public function show($slug)
    {
        $mission = Mission::whereSlug($slug)->with('course')->first();
        $submissions = Submission::whereMissionId($mission->id)->with('classroom')->get();

        return response()->json([
            "mission" => $mission,
            "submissions" => $submissions
        ]);
    }
}
