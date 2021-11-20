<?php

use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\WorkController;
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
Auth::routes();

Route::view('/', 'home.index');

/*User*/
Route::middleware(['auth'])->group(function () {
    Route::resources([
        'user-details' => UserDetailController::class,
        'education' => EducationController::class,
        'works' => WorkController::class,
        'courses' => CourseController::class,
        'skills' => SkillController::class,
        'languages' => LanguageController::class,
        'hobby' => HobbyController::class,
    ]);
    Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/{user}/update', [UserController::class, 'updateEmail'])->name('user.email.update');
    Route::post('user/{user}/password', [UserController::class, 'updatePassword'])->name('user.password.update');
    Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');
    // resume
    Route::get('/resume/download', [ResumeController::class, 'download'])->name('resume.download');
    Route::get('/resume', [ResumeController::class, 'index'])->name('resume.index');

});

/*Admin*/
//Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
//    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
//    Route::resources([
//        'levels' => LevelController::class,
//    ]);
//});



