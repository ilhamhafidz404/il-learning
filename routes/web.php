<?php

use App\Http\Controllers\Admin\{
    AuthController,
    ClassroomController,
    CourseController as AdminCourseController,
    DashboardController as AdminDashboardController,
    LecturerController as AdminLecturerController,
    MoreController,
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
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/demo', function () {
    return view('demotest');
})->name('demo');

Route::name('admin.')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'adminauth'], function () {

        Route::get('admin/dashboard', AdminDashboardController::class)->name('dashboard');

        Route::resource('admin/course', AdminCourseController::class, ['names' => 'course']);
        Route::resource('admin/lecturer', AdminLecturerController::class, ['names' => 'lecturer']);
        Route::resource('admin/student', StudentController::class, ['names' => 'student']);
        Route::resource('admin/classroom', ClassroomController::class, ['names' => 'classroom']);
        // 
        Route::post('/addcoursetolecturer', [MoreController::class, 'addCourseToLecturer'])->name('addCourseToLecturer');
        Route::post('/addclassroomtolecturer', [MoreController::class, 'addClassroomToLecturer'])->name('addClassroomToLecturer');
    });
});

Route::middleware(['auth'])->group(function () {

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

    // Route::get('/lecturers', LecturerController::class)->name('lecturers');

    Route::get('/mission/{slug}', [MissionController::class, 'show'])->name('mission.show');
    Route::get('/submission/{slug}', [SubmissionController::class, 'show'])->name('submission.show');
    Route::post('/change-theme-mode', ThemeModeController::class)->name('change.theme.mode');
    Route::get('/account', MyAccountController::class)->name('myaccount');
    Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');
});

Auth::routes();
