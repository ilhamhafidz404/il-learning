<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $sksCountdown = Carbon::parse($setting->sks_countdown);
        $admin = Admin::whereEmail(Session::get('email'))->first();

        return view('Backend.admin.setting', compact('setting', 'admin', 'sksCountdown'));
    }

    public function sksCountdown(Request $request)
    {
        if ($request->reset) {
            Setting::first()->update([
                'sks_countdown' => null
            ]);

            return redirect()->back()->with([
                'success' => true,
                'title' => 'Successfully reset Countdown for Accept SKS',
                'message' => 'Now Course countdown stopped'
            ]);
        }
        $request->validate([
            'date' => 'required',
            'time' => 'required'
        ]);

        $countdown = $request->date . ' ' . $request->time . ':00';
        Setting::first()->update([
            'sks_countdown' => $countdown
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Successfully Set Countdown for Accept SKS',
            'message' => 'Now Course countdown started'
        ]);
    }

    public function semesterControl()
    {
        // ambil data student dan +1 untuk field semester
        $students = Student::select('id', 'semester')->get();
        foreach ($students as $student) {
            $student->update([
                'semester' => $student->semester + 1
            ]);
        }

        // hapus deadlineSKS karena semester baru sudah dimulai
        Setting::first()->update([
            'sks_countdown' => null
        ]);

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Successfully for end this semester',
            'message' => 'Next semester is waiting'
        ]);
    }
}
