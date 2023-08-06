<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if (!$token = auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                "code" => "IL-02",
                "message" => "Email atau Password tidak sesuai",
            ]);
        }

        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json([
                "code" => "IL-01",
                "message" => "Login Successfully",
                'token' => $token
            ]);
        }


        return response()->json([]);
    }

    public function logout(Request $request)
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
