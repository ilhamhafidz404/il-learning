<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
}
