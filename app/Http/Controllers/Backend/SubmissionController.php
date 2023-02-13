<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmissionRequest;
use App\Mail\NotificationMail;
use App\Models\Completed;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Mission;
use App\Models\Progress;
use App\Models\Student;
use App\Models\Submission;
use App\Models\Submitsubmission;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        $user = Lecturer::whereUserId(Auth::user()->id)->first();
        $course = Course::whereSlug($_GET['slug'])->first();
        $missions = Mission::whereCourseId($course->id)->get();

        return view('backend.lecturer.submission.add', [
            'course' => $course,
            'user' => $user,
            'missions' => $missions
        ]);
    }

    public function store(SubmissionRequest $request)
    {
        $deadline = $request->deadline . ' ' . $request->time_deadline . ':00';
        $classroom = $request->classroom;

        $mission = Mission::whereId($request->mission)->first();

        if (!$request->theory) {
            $submission = Submission::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name) . '-' . Str::slug($mission->name),
                'description' => $request->description,
                'deadline' => $deadline,
                'mission_id' => $request->mission,
                'lecturer_id' => $request->lecturer,
                'course_id' => $request->course,
                'classroom_id' => $classroom,
            ]);
        } else {
            $submission = Submission::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name) . '-' . Str::slug($mission->name),
                'description' => $request->description,
                'theory' => $request->file('theory')->store('theory'),
                'mission_id' => $request->mission,
                'lecturer_id' => $request->lecturer,
                'course_id' => $request->course,
                'classroom_id' => $classroom,
            ]);
        }

        $students = Student::whereClassroomId($classroom)->get();
        foreach ($students as $student) {
            Completed::create([
                'user_id' => $student->user->id,
                'submission_id' => $submission->id,
                'status' => false
            ]);
        }

        $progresses = Progress::whereMissionId($request->mission)->get();
        if ($progresses->count() > 0) {
            foreach ($progresses as $progress) {
                $progress->update([
                    'submission_count' => $progress->submission_count + 1
                ]);
            }
        }

        foreach ($students as $student) {
            Mail::to($student->user->email)
                ->send(new NotificationMail);
        }


        return redirect()->back()->with([
            'success' => true,
            'title' => 'Successful Upload Submission',
            'message' => 'Your student has a new submission'
        ]);
    }

    public function show($slug)
    {
        $submission = Submission::whereSlug($slug)->first();
        $submitSubmission = Submitsubmission::whereUserId(Auth::user()->id)->whereSubmissionId($submission->id)->first();

        if (Auth::user()->hasRole('student')) {

            $user = Student::whereUserId(Auth::user()->id)->first();
            return view('backend.student.submission.show', [
                'submission' => $submission,
                'submitSubmission' => $submitSubmission,
                'user' => $user
            ]);
        } else {

            $user = Lecturer::whereUserId(Auth::user()->id)->first();
            $submitSubmissions = Submitsubmission::whereSubmissionId($submission->id)->get();
            $studentCount = Student::whereClassroomId($submission->classroom_id)->count();
            return view('backend.lecturer.submission.show', [
                'submission' => $submission,
                'user' => $user,
                'submitSubmissions' => $submitSubmissions,
                'studentCount' => $studentCount
            ]);
        }
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
    }
}
