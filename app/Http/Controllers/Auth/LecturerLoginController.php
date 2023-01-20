<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LecturerLoginController extends Controller
{
    public function index()
    {
        return view('auth.lecturer-login');
    }

    public function authenticate(Request $request)
    {
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);

        // if (Auth::guard('lecturer')->attempt($credentials)) {
        //     $login = Lecturer::where('email', $credentials['email'])->first();
        //     auth()->login($login);

        //     session()->put('lecturer', true);
        //     session()->put('email', $request->email);
        //     $request->session()->regenerate();
        //     $request->session()->regenerateToken();
        //     return redirect()->intended('dashboard');
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }
}
