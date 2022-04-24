<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login-teacher');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email'     => 'required|email:dns',
            'password'  => 'required'
        ]);

        $teacher= Teacher::whereEmail($_POST['email'])->first();

        if($teacher->count()){
            $checkPassword= Hash::check($_POST['password'], $teacher->password);

            if($checkPassword){
                return redirect('/');
            } 

            return back();
        }

        return back();
    }
}
