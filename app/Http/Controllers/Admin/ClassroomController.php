<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('backend.admin.classroom.index', compact('classrooms'));
    }

    public function create()
    {
        return view('backend.admin.classroom.add');
    }

    public function store(Request $request)
    {
        Classroom::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Berhasil Menambah Classroom',
            'message' => 'Sekarang Classroom telah bertambah'
        ]);
    }

    public function show($slug)
    {
        $classroom = Classroom::whereName($slug)->first();
        $students = Student::whereClassroomId($classroom->id)->paginate(10);
        return view('backend.admin.classroom.show', compact('students', 'classroom'));
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
