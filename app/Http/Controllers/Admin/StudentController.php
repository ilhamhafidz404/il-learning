<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        if (isset($_GET['search']) && $_GET['search'] != '') {
            $students = Student::where('nim', 'like', '%' . $_GET['search'] . '%')->paginate(10);
        } else {
            $students = Student::paginate(10);
        }
        return view('backend.admin.student.index', compact('students'));
    }
}
