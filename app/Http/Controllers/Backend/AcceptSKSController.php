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
        return view('Backend.acceptsks', [
            'courses' => Course::all()
        ]);
    }

    public function store(Request $request)
    {
        foreach ($request->select as $index => $select) {
            CourseUser::create([
                'course_id' => $request->select[$index],
                'user_id' => Auth::user()->id,
            ]);
        }
    }
}
