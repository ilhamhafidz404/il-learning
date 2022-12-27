<?php

use App\Http\Controllers\Backend\AcceptSKSController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LecturerController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // 
    Route::get('/lecturers', LecturerController::class)->name('lecturers');
    // 
    Route::get('/accept-sks', [AcceptSKSController::class, 'index'])->name('acceptsks.index');
    Route::post('/accept-sks', [AcceptSKSController::class, 'store'])->name('acceptsks.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
