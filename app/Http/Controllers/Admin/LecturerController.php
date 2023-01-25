<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\ManyToMany\ClassroomLecturer;
use App\Models\ManyToMany\CourseLecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::all();
        return view('backend.admin.lecturer.index', compact('lecturers'));
    }

    public function show($username)
    {
        $lecturer = Lecturer::whereHas('user', function ($q) {
            $q->where('username', '=', 'sherly');
        })->first();
        $courses = Course::all();
        $classrooms = Classroom::all();

        return view('backend.admin.lecturer.show', compact('lecturer', 'courses', 'classrooms'));
    }

    public function update(Request $request)
    {
        $lecturer = Lecturer::whereId($request->lecturer)->first();
        $lecturerName = $lecturer->user->name;
        if (isset($_GET['submit'])) {
            $submit = $_GET['submit'];
            if ($submit == 'course') {
                foreach ($request->courses as $index => $course) {
                    CourseLecturer::create([
                        'course_id' => $request->courses[$index],
                        'lecturer_id' => $request->lecturer
                    ]);
                }
                $title = "Berhasil Menambah course ";
                $message = "Course " . $lecturerName . ' telah ditambahkan!';
            } elseif ($submit == 'classroom') {
                foreach ($request->classrooms as $index => $classroom) {
                    ClassroomLecturer::create([
                        'classroom_id' => $request->classrooms[$index],
                        'lecturer_id' => $request->lecturer
                    ]);
                }
                $title = "Berhasil Menambah classroom ";
                $message = "Classroom " . $lecturerName . ' telah ditambahkan!';
            }
        }

        return redirect()->back()->with([
            'success' => true,
            'title' => $title,
            'message' => $message
        ]);
    }
}
