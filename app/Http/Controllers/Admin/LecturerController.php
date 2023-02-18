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
        $data = Lecturer::latest();

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
        // $lecturer = Lecturer::whereHas('user', function ($q) {
        //     $q->where('username', '=', $username);
        // })->first();
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $user = User::whereUsername($username)->first();
        $lecturer = Lecturer::whereUserId($user->id)->first();

        // $courses = Course::doesntHave('lecturer')->orWhereHas('lecturer', function ($q) {
        //     $q->where('lecturer_id', '!=', 1);
        // })->get();
        $courses = Course::all();
        $classrooms = Classroom::all();

        return view(
            'backend.admin.lecturer.show',
            compact('lecturer', 'courses', 'classrooms', 'admin')
        );
    }

    public function edit($user)
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $user = User::whereUsername($user)->first();
        $lecturer = Lecturer::whereUserId($user->id)->first();
        return view('backend.admin.lecturer.edit', compact('lecturer', 'user', 'admin'));
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
                $title = "Successfully Added course ";
                $message = "Course " . $lecturerName . ' has been added!';
            } elseif ($submit == 'classroom') {
                foreach ($request->classrooms as $index => $classroom) {
                    ClassroomLecturer::create([
                        'classroom_id' => $request->classrooms[$index],
                        'lecturer_id' => $request->lecturer
                    ]);
                }
                $title = "Successfully Added classroom ";
                $message = "Classroom " . $lecturerName . ' has been added!';
            }
        }

        return redirect()->back()->with([
            'success' => true,
            'title' => $title,
            'message' => $message
        ]);
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
