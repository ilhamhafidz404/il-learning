<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $admin = Admin::whereEmail(Session::get('email'))->first();

        return view('Backend.admin.setting', compact('setting', 'admin'));
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
}
