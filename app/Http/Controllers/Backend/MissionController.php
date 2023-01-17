<?php

namespace App\Http\Controllers\Backend;

use App\Models\Lecturer;
use App\Models\Mission;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Course;
use Illuminate\Support\Facades\Session;

class MissionController extends Controller
{
    public function create()
    {
        return view('backend.lecturer.mission.add', [
            'lecturer' => Lecturer::whereEmail(Session::get('email'))->first(),
            'course' => Course::whereSlug($_GET['slug'])->first()
        ]);
    }

    public function show($slug)
    {
        $mission = Mission::whereSlug($slug)->first();
        $submissions = Submission::whereMissionId($mission->id)->get();
        return view('backend.lecturer.mission.show', [
            'lecturer' => Lecturer::whereEmail(Session::get('email'))->first(),
            'mission' => $mission,
            'submissions' => $submissions,
        ]);
    }

    public function store(Request $request)
    {
        Mission::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'course_id' => $request->course,
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Berhasil Membuat Mission',
            'message' => 'Mission Baru untuk Mahasiswa'
        ]);
    }
}
