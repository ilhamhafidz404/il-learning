<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($username)
    {
        $user = User::whereUsername($username)->first();
        return view('backend.oneForAll.account.profile.show', compact('user'));
    }
}
