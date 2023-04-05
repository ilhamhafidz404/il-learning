<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LecturerRequest;
use App\Models\Admin;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\ManyToMany\ClassroomLecturer;
use App\Models\ManyToMany\CourseLecturer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LecturerController extends Controller
{

    public function index()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $data = Lecturer::select('id', 'nip', 'user_id')->with('user')->latest();

        if (isset($_GET['search'])) {
            $lecturers = $data->whereHas('user', function ($q) {
                $q->where('name', 'like', '%' . $_GET['search'] . '%');
            })->paginate(10);
        } else {
            $lecturers = $data->paginate(10);
        }
        $lecturerCount = $data->count();

        return view('backend.admin.lecturer.index', compact('lecturers', 'lecturerCount', 'admin'));
    }

    public function create()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        return view('backend.admin.lecturer.add', compact('admin'));
    }

    public function store(LecturerRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '', $request->name))),
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole('lecturer');

        if ($request->file) {
            Lecturer::create([
                'user_id' => $user->id,
                'profile' => $request->file('file')->store('profile'),
                'nip' => $request->nip,
                'gender' => $request->gender,
            ]);
        } else {
            Lecturer::create([
                'user_id' => $user->id,
                'profile' => 'profile/' . $request->gender . rand(1, 3) . '.jpg',
                'nip' => $request->nip,
                'gender' => $request->gender,
            ]);
        }

        return redirect()->back()->with([
            'success' => true,
            'title' => "Successfully added Lecturer",
            'message' => "Lecturer has been added"
        ]);
    }

    public function show($username)
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $user = User::whereUsername($username)->first();
        $lecturer = Lecturer::whereUserId($user->id)->first();

        $courses = Course::select('name', 'id', 'slug')->latest();
        $classrooms = Classroom::select('name', 'id', 'slug')->latest();

        return view(
            'backend.admin.lecturer.show',
            compact('lecturer', 'courses', 'classrooms', 'admin')
        );
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        Lecturer::whereUserId($id)->first()->delete();

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Successfully Removed Lecturer',
            'message' => 'One Lecturer data has been deleted'
        ]);
    }
}
