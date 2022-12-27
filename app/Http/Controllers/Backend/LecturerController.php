<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function __invoke()
    {
        return view('backend.lecturers', [
            'lecturers' => Lecturer::all()
        ]);
    }
}
