<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentRequest;
use App\Models\Admin;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();

        if (isset($_GET['search']) && $_GET['search'] != '') {
            $students = Student::where('nim', 'like', '%' . $_GET['search'] . '%')->paginate(10);
        } else {
            $students = Student::paginate(10);
        }
        return view('backend.admin.student.index', compact('students', 'admin'));
    }

    public function show($username)
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $user = User::whereUsername($username)->first();
        $student = Student::whereUserId($user->id)->first();

        return view('backend.admin.student.show', compact('student', 'user', 'admin'));
    }

    public function create()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $classrooms = Classroom::all();
        return view('backend.admin.student.add', compact('classrooms', 'admin'));
    }

    public function store(StudentRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '', $request->name))),
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole('student');

        if ($request->file) {
            Student::create([
                'nim' => $request->nim,
                'user_id' => $user->id,
                'classroom_id' => $request->classroom,
                'profile' => $request->file('file')->store('profile'),
                'gender' => $request->gender
            ]);
        } else {
            Student::create([
                'nim' => $request->nim,
                'user_id' => $user->id,
                'classroom_id' => $request->classroom,
                'profile' => 'profile/' . $request->gender . rand(1, 3) . '.jpg',
                'gender' => $request->gender
            ]);
        }

        return redirect()->back()->with([
            'success' => true,
            'title' => "Berhasil menambah Student",
            'message' => "Student sudah ditambhkan"
        ]);
    }

    public function edit($username)
    {
        # code...
    }

    public function destroy($id)
    {

        User::find($id)->delete();
        Student::whereUserId($id)->first()->delete();

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Berhasil Menghapus Student',
            'message' => 'Sekarang Student telah dihapus'
        ]);
    }
}
