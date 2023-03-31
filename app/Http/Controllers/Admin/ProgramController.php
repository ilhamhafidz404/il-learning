<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProgramRequest;
use App\Models\Admin;
use App\Models\Faculty;
use App\Models\Level;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    public function index()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $programs = Program::paginate(10);

        return view('backend.admin.program.index', compact('admin', 'programs'));
    }

    public function create()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $faculties = Faculty::all();
        $levels = Level::all();

        return view('backend.admin.program.add', compact('admin', 'faculties', 'levels'));
    }

    public function store(ProgramRequest $request)
    {
        $lastCode = Program::select('id')->latest('id')->first();
        $code = $lastCode->id + 1;
        if ($code >= 10) {
            $codeForThis = (string)$code;
        } else {
            $codeForThis = "0" . (string)$code;
        }


        Program::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'level' => $request->level,
            'code' => $codeForThis,
            'faculty_id' => $request->faculty
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Successfully Added Program Study',
            'message' => 'Now Program Study has expanded'
        ]);
    }

    public function edit($slug)
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $program = Program::whereSlug($slug)->first();

        return view('backend.admin.program.edit', compact('admin', 'program'));
    }

    public function update(ProgramRequest $request, $id)
    {
        $program = Program::find($id);
        $program->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'level' => $request->level,
        ]);

        return redirect()->route('admin.program.edit', $program->slug)->with([
            'success' => true,
            'title' => 'Successfully Edit Program Study',
            'message' => 'Now Data Program Study has changed'
        ]);
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
