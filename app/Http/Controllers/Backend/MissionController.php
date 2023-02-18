<?php

namespace App\Http\Controllers\Backend;

use App\Models\Lecturer;
use App\Models\Mission;
use App\Models\Submission;
use App\Http\Controllers\Controller;
use App\Http\Requests\MissionRequest;
use Illuminate\Support\Str;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    public function create()
    {
        return view('backend.lecturer.mission.add', [
            'user' => Lecturer::whereUserId(Auth::user()->id)->first(),
            'course' => Course::whereSlug($_GET['slug'])->first()
        ]);
    }

    public function show($slug)
    {
        $mission = Mission::whereSlug($slug)->first();
        $submissions = Submission::whereMissionId($mission->id)->get();

        if (Auth::user()->hasRole('student')) {
            $user = Student::whereUserId(Auth::user()->id)->first();
        } else {
            $user = Lecturer::whereUserId(Auth::user()->id)->first();
        }

        return view('backend.oneForAll.mission.show', [
            'mission' => $mission,
            'submissions' => $submissions,
            'user' => $user
        ]);
    }

    public function store(MissionRequest $request)
    {
        Mission::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'course_id' => $request->course,
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Successfully Made Missions',
            'message' => 'New Mission for Students'
        ]);
    }
}
