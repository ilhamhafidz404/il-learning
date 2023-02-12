<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassroomRequest;
use App\Models\Admin;
use App\Models\Classroom;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ClassroomController extends Controller
{
    public function index()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $data = Classroom::latest();
        if (isset($_GET['search'])) {
            $classrooms = $data->where('name', 'like', '%' . $_GET['search'] . '%')->paginate(10);
        } else {
            $classrooms = $data->paginate(10);
        }
        $classroomCount = $data->count();
        return view('backend.admin.classroom.index', compact('classrooms', 'admin'));
    }

    public function create()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $lecturers = Lecturer::all();
        return view('backend.admin.classroom.add', compact('lecturers', 'admin'));
    }

    public function store(ClassroomRequest $request)
    {
        Classroom::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'mentor' => $request->mentor
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Berhasil Menambah Classroom',
            'message' => 'Sekarang Classroom telah bertambah'
        ]);
    }

    public function show($slug)
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $classroom = Classroom::whereName($slug)->first();
        $students = Student::whereClassroomId($classroom->id)->paginate(10);
        return view('backend.admin.classroom.show', compact('students', 'classroom', 'admin'));
    }

    public function edit($slug)
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $lecturers = Lecturer::all();
        $classroom = Classroom::whereSlug($slug)->first();

        return view('backend.admin.classroom.edit', compact('admin', 'lecturers', 'classroom'));
    }

    public function update(Request $request, $id)
    {
        $classroom = Classroom::find($id);
        $classroom->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'mentor' => $request->mentor,
        ]);

        return redirect()->route('admin.classroom.edit', $classroom->slug)->with([
            'success' => true,
            'title' => 'Berhasil Mengedit Classroom',
            'message' => 'Sekarang Data Classroom telah berubah'
        ]);
    }

    public function destroy($id)
    {

        Classroom::find($id)->delete();

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Berhasil Menghapus Student',
            'message' => 'Sekarang Student telah dihapus'
        ]);
    }
}
