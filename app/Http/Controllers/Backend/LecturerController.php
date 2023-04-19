<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function __invoke()
    {
        $lecturer = Lecturer::all();
        if (isset($_GET['q']) && $_GET['q'] != '') {
            $lecturer = Lecturer::whereHas('user', function ($q) {
                $q->where('name', 'LIKE', "%" . $_GET['q'] . "%");
            })->get();
        }

        return view('backend.oneForAll.lecturer.index', [
            'lecturers' => $lecturer,
            'user' => Student::whereUserId(Auth::user()->id)->first()
        ]);
    }
}
