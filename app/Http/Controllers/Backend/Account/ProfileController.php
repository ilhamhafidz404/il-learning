<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($username)
    {
        $user = User::whereUsername($username)->first();
        $acceptCourse = Course::whereHas('user', function ($q) {
            $q->where('user_id', '=', Auth::user()->id);
        })->get();
        return view('backend.oneForAll.account.profile.show', compact('user', 'acceptCourse'), [
            'student' => Student::whereUserId(Auth::user()->id)->first()
        ]);
    }
}
