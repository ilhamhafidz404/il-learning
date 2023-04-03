<?php

use App\Http\Controllers\Admin\{
    AuthController,
    ClassroomController as AdminClassroomController,
    CourseController as AdminCourseController,
    DashboardController as AdminDashboardController,
    LecturerController as AdminLecturerController,
    MoreController,
    ProgramController,
    StudentController,
    LevelController,
    SettingController
};

use App\Http\Controllers\Backend\AcceptSKSController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Backend\Account\ProfileController;
use App\Http\Controllers\Backend\{
    ClassroomController,
    CourseController,
    DashboardController,
    SubmissionController,
    MissionController
};

use App\Http\Controllers\more\{
    SubmitSubmissionController,
    DeleteSubmitSubmission,
    MyAccountController,
    ThemeModeController
};
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

        Route::resource('admin/courses', AdminCourseController::class, ['names' => 'course']);

        Route::resource('admin/lecturers', AdminLecturerController::class, [
            'names' => 'lecturer',
            'only' => ['index', 'show', 'destroy', 'create', 'store']
        ]);

        Route::resource('admin/students', StudentController::class, ['names' => 'student']);

        Route::resource('admin/classrooms', AdminClassroomController::class, ['names' => 'classroom']);

        Route::resource('admin/programs', ProgramController::class, ['names' => 'program']);

        Route::resource('admin/levels', LevelController::class, ['names' => 'level']);

        // 
        Route::post('/addcoursetolecturer', [MoreController::class, 'addCourseToLecturer'])->name('addCourseToLecturer');
        Route::post('/addclassroomtolecturer', [MoreController::class, 'addClassroomToLecturer'])->name('addClassroomToLecturer');
        Route::post('admin/change-theme-mode', [MoreController::class, 'changeThemeMode'])->name('change.theme.mode');
        // 
        Route::delete(
            '/admin/deletelecturerforcourse/{lecturer}/{course}',
            [MoreController::class, 'deleteLecturerForCourse']
        )->name('deletelecturerforcourse');

        Route::delete(
            '/admin/deleteclassroomforlecturer/{lecturer}/{classroom}',
            [MoreController::class, 'deleteClassroomForLecturer']
        )->name('deleteclassroomforcourse');

        // 
        Route::get('/setting', [SettingController::class, 'index'])->name('setting');
        Route::post('admin/sks-countdown', [SettingController::class, 'sksCountdown'])->name('setting.sksCountdown');
    });
});

Route::middleware(['auth'])->group(function () {

    Route::resource('/missions', MissionController::class, [
        'names' => 'mission',
        'only' => ['store', 'create', 'show']
    ]);

    Route::resource('/submission', SubmissionController::class, [
        'names' => 'submission',
        'only' => ['create', 'store', 'destroy', 'show']
    ]);

    Route::resource('/classroom', ClassroomController::class, [
        'names' => 'classroom',
        'only' => ['index', 'show']
    ]);

    Route::get('/course', [CourseController::class, 'index'])->name('course.index');
    Route::get('/course/{slug}', [CourseController::class, 'show'])->name('course.show');

    Route::post('/acceptsks', [AcceptSKSController::class, 'store'])->name('acceptsks.store');
    Route::get('/acceptsks', [AcceptSKSController::class, 'index'])->name('acceptsks.index');

    Route::delete('/submitsubmission/{id}', DeleteSubmitSubmission::class)->name('submitsubmission.destroy');
    Route::post('/submitsubmission', SubmitSubmissionController::class)->name('submitsubmission');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::post('/change-theme-mode', ThemeModeController::class)->name('change.theme.mode');

    Route::get('/account', MyAccountController::class)->name('myaccount');
    Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile/{username}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/lecturer-profile/{username}', [ProfileController::class, 'showLecturer'])->name('lecturer.profile.show');
});

Auth::routes([
    'register' => false
]);
