<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ManyToMany\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcceptSKSController extends Controller
{
    public function index()
    {
        $acceptCourse = Course::whereHas('user', function ($q) {
            $q->where('user_id', '=', Auth::user()->id);
        })->get();
        $courses = Course::doesntHave('user')->orWhereHas('user', function ($q) {
            $q->where('user_id', '!=', Auth::user()->id);
        })->get();

        return view('Backend.acceptsks', [
            'courses' => $courses,
            'acceptCourse' => $acceptCourse
        ]);
    }

    public function store(Request $request)
    {
        // karena ada token
        if (count($request->all()) <= 1) {
            return redirect()->back()->with([
                'error' => true,
                'title' => 'Gagal Daftar SKS',
                'message' => 'Gagal Mengambil SKS'
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
            'title' => 'Berhasil Daftar SKS',
            'message' => 'Berhasil Mengambil SKS'
        ]);
    }
}
