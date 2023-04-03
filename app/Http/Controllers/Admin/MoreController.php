<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ManyToMany\ClassroomLecturer;
use App\Models\ManyToMany\CourseLecturer;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MoreController extends Controller
{
    public function addCourseToLecturer(Request $request)
    {
        CourseLecturer::create([
            'course_id' => $request->course,
            'lecturer_id' => $request->lecturer,
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => "Successfully Added Course for Lecturers",
            'message' => "Now this lecturer is teaching a new course"
        ]);
    }

    public function addClassroomToLecturer(Request $request)
    {
        ClassroomLecturer::create([
            'classroom_id' => $request->classroom,
            'lecturer_id' => $request->lecturer,
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => "Successfully Added Classrooms for Lecturers",
            'message' => "Now this lecturer is teaching a new classroom"
        ]);
    }

    public function changeThemeMode()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $mode = 'light';

        if ($admin->mode == 'light') {
            $mode = 'dark';
        }
        $admin->update([
            'mode' => $mode,
        ]);

        return back();
    }

    // 

    public function deleteLecturerForCourse($lecturer, $course)
    {
        $result = CourseLecturer::whereCourseId($course)->whereLecturerId($lecturer)->first();
        $result->delete();

        return redirect()->back()->with([
            'success' => true,
            'title' => "Successfully delete",
            'message' => "The lecturer is no longer teaching this course"
        ]);
    }

    public function deleteClassroomForLecturer($lecturer, $classroom)
    {
        $result = ClassroomLecturer::whereClassroomId($classroom)->whereLecturerId($lecturer)->first();
        $result->delete();

        return redirect()->back()->with([
            'success' => true,
            'title' => "Successfully delete",
            'message' => "The lecturer is no longer teaching this classroom"
        ]);
    }
}
