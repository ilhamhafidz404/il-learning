<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\Course;
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
        // $student = Student::whereHas('user', function ($q) {
        //     $q->where('username', '=', $username);
        // })->first();
        $acceptCourse = Course::whereHas('user', function ($q) {
            $q->where('user_id', '=', Auth::user()->id);
        })->get();
        return view('backend.oneForAll.account.profile.show', compact('user', 'acceptCourse'), [
            'student' => Student::whereUserId(Auth::user()->id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if ($request->profile) {

            if (File::exists(public_path('storage/' . $student->profile))) {
                File::delete(public_path('storage/' . $student->profile));
            }

            $student->update([
                'profile' => $request->file('profile')->store('profile'),
            ]);
        } else {
            $student->update([
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
