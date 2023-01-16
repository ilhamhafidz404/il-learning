<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmissionRequest;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Submission;
use App\Models\Submitsubmission;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lecturer = Lecturer::whereEmail(Session::get('email'))->first();
        $course = Course::whereSlug($_GET['slug'])->first();

        return view('backend.lecturer.submission.add', [
            'course' => $course,
            'lecturer' => $lecturer
        ]);
    }

    public function store(Request $request)
    {
        Submission::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'deadline' => $request->deadline,
            'lecturer_id' => $request->lecturer,
            'course_id' => $request->course,
            'classroom_id' => $request->classroom,
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Berhasil Meng-upload Submission',
            'message' => 'Mahasiswa anda mendapat tugas baru'
        ]);
    }

    public function show($slug)
    {
        if (Session::has('lecturer')) {
            $lecturer = Lecturer::whereEmail(Session::get('email'))->first();
            $submission = Submission::whereSlug($slug)->first();
            $submitSubmissions = Submitsubmission::whereSubmissionId($submission->id)->get();
            // 
            $userCount = User::whereClassroomId($submission->classroom_id)->count();
            return view('backend.lecturer.submission.show', [
                'submission' => $submission,
                'lecturer' => $lecturer,
                'submitSubmissions' => $submitSubmissions,
                'userCount' => $userCount
            ]);
        }
        $submission = Submission::whereSlug($slug)->first();
        $submitSubmission = Submitsubmission::whereUserId(Auth::user()->id)->whereSubmissionId($submission->id)->first();
        return view('backend.student.submission.show', [
            'submission' => $submission,
            'submitSubmission' => $submitSubmission,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
