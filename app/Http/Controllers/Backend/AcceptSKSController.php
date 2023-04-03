<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\ManyToMany\CourseUser;
use App\Models\Setting;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcceptSKSController extends Controller
{
    public function index()
    {
        $setting = Setting::select('sks_countdown')->first();
        if ($setting->sks_countdown < now()) {
            return redirect()->route('dashboard')->with([
                'error' => 'The time for taking SKS is too late'
            ]);
        }
        //variabel untuk menampung data course yang sudah diambil
        $acceptCourse = Course::whereHas('user', function ($q) { // cek many to many course user
            $q->where('user_id', '=', Auth::user()->id); // jika dalam many to many usernya ada user_id yang sama
        })->get(); // maka ambil data course-nya

        // variabel untuk memanggil semua data course
        $courses = Course::doesntHave('user') // cek yang data coursenya tidak mempunya many to many dengan user
            ->orWhereHas('user', function ($q) { // atau jika cek many to many course user
                $q->where('user_id', '!=', Auth::user()->id); // jika user_id nya tidak sama dengan id login maka
            })->where('program_id', '=', Auth::user()->student[0]->classroom->program->id) // cek apakah prodi user login cocok dengan course-nya
            ->get();

        $user = Student::whereUserId(Auth::user()->id)->first();

        return view('Backend.acceptsks', compact('user', 'setting'), [
            'courses' => $courses,
            'acceptCourse' => $acceptCourse,
        ]);
    }

    public function store(Request $request)
    {
        // karena ada token
        if (count($request->all()) <= 1) {
            return redirect()->back()->with([
                'error' => true,
                'title' => 'Failed to take SKS',
                'message' => 'please try or contact the operator'
            ]);
        }
        foreach ($request->select as $index => $select) {
            CourseUser::create([
                'course_id' => $request->select[$index],
                'user_id' => Auth::user()->id,
            ]);
        }
        return redirect()->back()->with([
            'success' => true,
            'title' => 'Success to take SKS',
            'message' => 'study hard and make your parents proud'
        ]);
    }
}
