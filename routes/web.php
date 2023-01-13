<?php

use App\Http\Controllers\Auth\LecturerLoginController as AuthLecturerLoginController;
use App\Http\Controllers\Backend\AcceptSKSController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SubmissionController;
use App\Http\Controllers\Backend\LecturerController;
use App\Http\Controllers\Backend\SubmitSubmissionController;
use App\Http\Controllers\more\ThemeModeController;
use Illuminate\Routing\Router;
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


Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/lecturer-login', [AuthLecturerLoginController::class, 'index'])->name('lecturer.login');
    Route::post('/lecturer-login', [AuthLecturerLoginController::class, 'authenticate'])->name('lecturer.authenticate');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // 
    Route::get('/course', [CourseController::class, 'index'])->name('course.index');
    Route::get('/course/{slug}', [CourseController::class, 'show'])->name('course.show');
    // 
    Route::get('/lecturers', LecturerController::class)->name('lecturers');
    // 
    Route::get('/acceptsks', [AcceptSKSController::class, 'index'])->name('acceptsks.index');
    Route::post('/acceptsks', [AcceptSKSController::class, 'store'])->name('acceptsks.store');
    // 
    Route::get('/submission/{slug}', [SubmissionController::class, 'show'])->name('submission.show');
    Route::post('/submission', [SubmissionController::class, 'store'])->name('submission.store');
    //
    Route::post('/submitsubmission', SubmitSubmissionController::class)->name('submitsubmission');
    //  
    Route::post('/change-theme-mode', ThemeModeController::class)->name('change.theme.mode');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
