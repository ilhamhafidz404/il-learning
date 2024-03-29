<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function show($username)
    {
        $user = User::whereUsername($username)->first();
        $acceptCourse = Course::whereHas('user', function ($q) {
            $q->where('user_id', '=', Auth::user()->id);
        })->get();
        return view('backend.student.profile.show', compact('user', 'acceptCourse'), [
            'student' => Student::whereUserId(Auth::user()->id)->first()
        ]);
    }

    public function showLecturer($username)
    {
        return view('backend.lecturer.profile.show', [
            'user' => Lecturer::whereUserId(Auth::user()->id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->hasRole('student')) {
            $user = Student::find($id);
        } else {
            $user = Lecturer::find($id);
        }

        if ($request->profile) {
            $defaultProfiles = [
                "profile/woman1.jpg",
                "profile/woman2.jpg",
                "profile/woman3.jpg",
                "profile/man3.jpg",
                "profile/man2.jpg",
                "profile/man1.jpg"
            ];

            if (!array_search($user->profile, $defaultProfiles)) {
                if (File::exists(public_path('storage/' . $user->profile))) {
                    File::delete(public_path('storage/' . $user->profile));
                }
            }


            $user->update([
                'profile' => $request->file('profile')->store('profile'),
            ]);
        } else {
            $user->update([
                'phone' => $request->phone,
                'birthday' => $request->birthday,
                'address' => $request->address,
                'about' => $request->about,
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,
                'tiktok' => $request->tiktok,
                'github' => $request->github,
                'twitter' => $request->twitter,
            ]);
        }

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Mengedit Profile',
            'message' => 'Profile anda sekarang berubah'
        ]);
    }
}
