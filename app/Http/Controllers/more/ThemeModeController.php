<?php

namespace App\Http\Controllers\more;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeModeController extends Controller
{
    public function __invoke()
    {
        $mode = 'light';
        if (Auth::user()->mode == 'light') {
            $mode = 'dark';
        }
        User::find(Auth::user()->id)->update([
            'mode' => $mode,
        ]);

        return back();
    }
}
