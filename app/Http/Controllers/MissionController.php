<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Mission;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MissionController extends Controller
{
    public function show($slug)
    {
        $mission = Mission::whereSlug($slug)->first();
        $submissions = Submission::whereMissionId($mission->id)->get();
        return view('backend.lecturer.mission.show', [
            'lecturer' => Lecturer::whereEmail(Session::get('email'))->first(),
            'mission' => $mission,
            'submissions' => $submissions
        ]);
    }
}
