<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\ManyToMany\CourseLecturer;
use App\Models\ManyToMany\CourseUser;
use App\Models\Mission;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $data = Course::latest();

        if (isset($_GET['search'])) {
            $courses = $data->where('name', 'like', '%' . $_GET['search'] . '%')->paginate(10);
        } else {
            $courses = $data->paginate(10);
        }
        $courseCount = $data->count();

        return view('backend.admin.course.index', compact('courses', 'courseCount', 'admin'));
    }

    public function create()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        return view('backend.admin.course.add', compact('admin'));
    }

    public function store(CourseRequest $request)
    {
        Course::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'sks' => $request->sks,
            'background' => $request->file('file')->store('course'),
            'description' => $request->description,
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Successfully added course',
            'message' => 'Now the Course has been added'
        ]);
    }

    public function edit($slug)
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $course = Course::whereSlug($slug)->first();
        return view('backend.admin.course.edit', compact('course', 'admin'));
    }

    public function update(Request $request, $slug)
    {
        $course = Course::whereSlug($slug)->first();

        if (!$request->file) {

            $request->validate([
                'name' => 'required',
                'sks' => 'required',
                'description' => 'required',
            ]);

            $course->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'sks' => $request->sks,
                'description' => $request->description,
            ]);
        } else {
            $request->validate([
                'file' => 'required',
            ]);

            if (File::exists(public_path('storage/' . $course->background))) {
                File::delete(public_path('storage/' . $course->background));
            }

            $course->update([
                'background' => $request->file('file')->store('course'),
            ]);
        }
        return redirect()->route('admin.course.edit', $course->slug)->with([
            'success' => true,
            'title' => 'Successfully Editing Course',
            'message' => 'Now the Data Course has changed'
        ]);
    }

    public function show($slug)
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $course = Course::whereSlug($slug)->first();
        $lecturers = Lecturer::all();

        return view('backend.admin.course.show', compact('course', 'lecturers', 'admin'));
    }

    public function destroy($id)
    {
        Course::find($id)->delete();

        $courseLecturers = CourseLecturer::whereCourseId($id)->get();
        foreach ($courseLecturers as $courseLecturer) {
            $courseLecturer->delete();
        }

        $courseUsers = CourseUser::whereCourseId($id)->get();
        foreach ($courseUsers as $courseUser) {
            $courseUser->delete();
        }

        $missions = Mission::whereCourseId($id)->get();
        foreach ($missions as $mission) {
            $mission->delete();
        }

        $submissions = Submission::whereCourseId($id)->get();
        foreach ($submissions as $submission) {
            $submission->delete();
        }

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Successfully Deleted Course',
            'message' => 'Now Course has been removed'
        ]);
    }
}
