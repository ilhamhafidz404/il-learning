<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LevelRequest;
use App\Models\Admin;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LevelController extends Controller
{
    public function index()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $levels = Level::latest()->get();
        $levelCount = $levels->count();

        return view('Backend.admin.level.index', compact('admin', 'levels', 'levelCount'));
    }

    public function create()
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();

        return view('Backend.admin.level.add', compact('admin'));
    }

    public function store(LevelRequest $request)
    {
        Level::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Successfully Added Level',
            'message' => 'Now Level has expanded'
        ]);
    }

    public function edit($slug)
    {
        $admin = Admin::whereEmail(Session::get('email'))->first();
        $level = Level::whereSlug($slug)->first();

        return view('Backend.admin.level.edit', compact('level', 'admin'));
    }

    public function update(LevelRequest $request, $id)
    {
        $level = Level::find($id);
        $level->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ]);

        return redirect()->route('admin.level.edit', $level->slug)->with([
            'success' => true,
            'title' => 'Successfully Edit Level',
            'message' => 'Now Data Level has changed'
        ]);
    }

    public function destroy($id)
    {
        Level::find($id)->delete();

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Successfully Destroy Level',
            'message' => 'Now data Level is reduced'
        ]);
    }
}
