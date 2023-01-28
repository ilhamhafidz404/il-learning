<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
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
