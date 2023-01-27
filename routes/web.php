<?php

use App\Http\Controllers\Admin\{
    AuthController,
    ClassroomController,
    CourseController as AdminCourseController,
    DashboardController as AdminDashboardController,
    LecturerController as AdminLecturerController,
    StudentController
};

use App\Http\Controllers\Backend\AcceptSKSController;

use App\Http\Controllers\Backend\Account\ProfileController;

use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SubmissionController;
use App\Http\Controllers\Backend\LecturerController;
use App\Http\Controllers\Backend\MissionController;

use App\Http\Controllers\more\{
    SubmitSubmissionController,
    DeleteSubmitSubmission,
    MyAccountController,
    ThemeModeController
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/demo', function () {
    return view('demotest');
})->name('demo');

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    // 
    Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('admin.authenticate');
});

Route::middleware(['auth'])->group(function () {

    // Route::middleware(['role:student'])->group(function () {
    //     Route::post('/acceptsks', [AcceptSKSController::class, 'store'])->name('acceptsks.store');
    //     Route::get('/acceptsks', [AcceptSKSController::class, 'index'])->name('acceptsks.index');
    //     Route::delete('/submitsubmission/{id}', DeleteSubmitSubmission::class)->name('submitsubmission.destroy');
    //     Route::post('/submitsubmission', SubmitSubmissionController::class)->name('submitsubmission');
    // });
    // Route::middleware(['role:lecturer'])->group(function () {
    //     Route::get('/mission/add', [MissionController::class, 'create'])->name('mission.create');
    //     Route::post('/mission', [MissionController::class, 'store'])->name('mission.store');
    //     Route::get('/submission/add', [SubmissionController::class, 'create'])->name('submission.create');
    //     Route::post('/submission', [SubmissionController::class, 'store'])->name('submission.store');
    //     Route::delete('/submission/{id}', [SubmissionController::class, 'destroy'])->name('submission.destroy');
    // });
    Route::post('/mission', [MissionController::class, 'store'])->name('mission.store');
    Route::get('/mission/add', [MissionController::class, 'create'])->name('mission.create');
    Route::get('/submission/add', [SubmissionController::class, 'create'])->name('submission.create');
    Route::post('/submission', [SubmissionController::class, 'store'])->name('submission.store');
    Route::delete('/submission/{id}', [SubmissionController::class, 'destroy'])->name('submission.destroy');
    Route::post('/acceptsks', [AcceptSKSController::class, 'store'])->name('acceptsks.store');
    Route::get('/acceptsks', [AcceptSKSController::class, 'index'])->name('acceptsks.index');
    Route::delete('/submitsubmission/{id}', DeleteSubmitSubmission::class)->name('submitsubmission.destroy');
    Route::post('/submitsubmission', SubmitSubmissionController::class)->name('submitsubmission');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/course', [CourseController::class, 'index'])->name('course.index');
    Route::get('/course/{slug}', [CourseController::class, 'show'])->name('course.show');
    Route::get('/lecturers', LecturerController::class)->name('lecturers');
    Route::get('/mission/{slug}', [MissionController::class, 'show'])->name('mission.show');
    Route::get('/submission/{slug}', [SubmissionController::class, 'show'])->name('submission.show');
    Route::post('/change-theme-mode', ThemeModeController::class)->name('change.theme.mode');
    Route::get('/account', MyAccountController::class)->name('myaccount');
    Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');
});

Route::get('admin/dashboard', AdminDashboardController::class)->name('admin.dashboard');

Route::get('admin/course', [AdminCourseController::class, 'index'])->name('admin.course.index');
Route::get('admin/course/add', [AdminCourseController::class, 'create'])->name('admin.course.create');
Route::post('admin/course', [AdminCourseController::class, 'store'])->name('admin.course.store');
Route::delete('admin/course/{id}', [AdminCourseController::class, 'destroy'])->name('admin.course.destroy');

Route::get('admin/lecturer', [AdminLecturerController::class, 'index'])->name('admin.lecturer.index');
Route::get('admin/lecturer/{username}', [AdminLecturerController::class, 'show'])->name('admin.lecturer.show');
Route::get('admin/lecturer/add', [AdminLecturerController::class, 'create'])->name('admin.lecturer.create');
Route::post('admin/lecturer/', [AdminLecturerController::class, 'update'])->name('admin.lecturer.update');
Route::delete('admin/lecturer/{id}', [AdminLecturerController::class, 'destroy'])->name('admin.lecturer.destroy');

Route::get('admin/student', [StudentController::class, 'index'])->name('admin.student.index');
Route::get('admin/classroom', [ClassroomController::class, 'index'])->name('admin.classroom.index');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
