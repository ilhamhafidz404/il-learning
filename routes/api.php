<?php

use App\Http\Controllers\_AcceptCreditsController;
use App\Http\Controllers\_CompleatedSubmissionController;
use App\Http\Controllers\_CourseLecturerController;
use App\Http\Controllers\_StudentCompleteSubmissionController;
use App\Http\Controllers\_SubmitSubmissionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\SubmitsubmissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource("/courses", CourseController::class);
Route::apiResource("/classrooms", ClassroomController::class);
Route::apiResource("/missions", MissionController::class);
Route::apiResource("/submissions", SubmissionController::class);
Route::apiResource("/submit-submissions", SubmitsubmissionController::class);

//
Route::get("/progress/{userId}/", ProgressController::class);
Route::get("/course-leturer/{lecturerId}/", _CourseLecturerController::class);
Route::post("/accept-credits", _AcceptCreditsController::class);
Route::post("/submit-submission", _SubmitSubmissionController::class);
Route::get("/students-submission-complete/{submissionSlug}", _StudentCompleteSubmissionController::class);
Route::get("/uncompleateds-submission/{userId}", _CompleatedSubmissionController::class);

//
Route::post("/auth/login", [AuthController::class, "login"]);
Route::post("/auth/logout", [AuthController::class, "logout"]);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
