<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProgramController extends Controller
{
    public function index()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $programs = Program::paginate(10);

        return view('backend.admin.program.index', compact('admin', 'programs'));
    }

    public function destroy($id)
    {
        Program::find($id)->delete();

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Delete Successfull!',
            'message' => 'Program Study success to destroy'
        ]);
    }
}
