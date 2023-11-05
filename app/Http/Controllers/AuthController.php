<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (!$request->loginAsAdmin) {
            $user = User::whereEmail($request->email)->first();

            if (!$token = auth()->attempt($request->only('email', 'password'))) {
                return response()->json([
                    "code" => "IL-02",
                    "message" => "Email atau Password tidak sesuai",
                ]);
            }

            $loginAs = "";
            $userData = [];

            if ($user->hasRole("student")) {
                $loginAs = "student";
                $userData = Student::whereUserId($user->id)->with("user")->with("classroom")->first();
            } else {
                $loginAs = "lecturer";
                $userData = Lecturer::with("user")->with("course")->first();
            }

            if ($user && Hash::check($request->password, $user->password)) {
                return response()->json([
                    "code" => "IL-01",
                    "message" => "Login Successfully",
                    'token' => $token,
                    "user" => $user,
                    "userData" => $userData,
                    "authStatus" => "authenticate",
                    "loginAs" => $loginAs
                ]);
            }
        } else {
            $admin = Admin::whereEmail($request->email)->first();

            if ($admin && Hash::check($request->password, $admin->password)) {
                return response()->json([
                    "code" => "IL-01",
                    "message" => "Login Successfully",
                    // 'token' => $token,
                    "admin" => $admin,
                    "authStatus" => "authenticate",
                    "loginAs" => "admin"
                ]);
            } else {
                return response()->json([
                    "code" => "IL-02",
                    "message" => "Email atau Password tidak sesuai",
                ]);
            }
        }
    }

    public function logout()
    {
        //remove token
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        if ($removeToken) {
            //return response JSON
            return response()->json([
                'success' => true,
                'message' => 'Logout Berhasil!',
            ]);
        }
    }
}
