<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function __invoke($userId)
    {
        $progresses = Progress::all();

        return response()->json($progresses);
    }
}
