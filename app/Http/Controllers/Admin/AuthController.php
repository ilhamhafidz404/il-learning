<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.admin.login');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (
            auth()->guard('admin')->attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])
        ) {
            $user = auth()->guard('admin')->user();
            session()->put('admin', true);
            session()->put('email', $request->email);
            $request->session()->regenerate();
            $request->session()->regenerateToken();
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('error', 'Whoops! invalid email and password.');
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logout sucessfully');
        return redirect(route('admin.login'));
    }
}
