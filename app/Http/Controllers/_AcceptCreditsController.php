<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Http\Request;

class _AcceptCreditsController extends Controller
{

  public function __invoke(Request $request)
  {
    $user = User::find($request->userId);
    foreach ($request->courses as $course) {
      $user->course()->attach($course);
    }
    return response()->json([
      "code" => "IL-01",
      "message" => "Accept Credits Successfully",
    ]);
  }
}
