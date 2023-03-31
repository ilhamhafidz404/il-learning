<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
}
