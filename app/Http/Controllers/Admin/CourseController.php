<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ManyToMany\CourseLecturer;
use App\Models\ManyToMany\CourseUser;
use App\Models\Mission;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('backend.admin.course.index', compact('courses'));
    }

    public function create()
    {
        return view('backend.admin.course.add');
    }

    public function store(Request $request)
    {
        Course::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'sks' => $request->sks,
            'description' => $request->description,
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Berhasil Menambah Course',
            'message' => 'Sekarang Course telah bertambah'
        ]);
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
            'title' => 'Berhasil Menghapus Course',
            'message' => 'Sekarang Course telah dihapus'
        ]);
    }
}
