<?php

use App\Http\Controllers\Admin\ClassRoomController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\GuardController;
use App\Http\Controllers\Admin\PeriodSettingController;
use App\Http\Controllers\Admin\PersonalController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/students/assessment/{id}', [StudentController::class, 'assessment'])->name('students.assessment');
    Route::resource('students', StudentController::class)->middleware('period');

    Route::middleware('headmaster')->group(function () {
        Route::resource('periodSettings', PeriodSettingController::class);
        Route::resource('classRooms', ClassRoomController::class);
        Route::resource('guards', GuardController::class);
        Route::resource('personals', PersonalController::class);
        Route::get('/generalSettings/show', [GeneralSettingController::class, 'show'])->name('generalSettings.show');
        Route::put('/generalSettings/update', [GeneralSettingController::class, 'update'])->name('generalSettings.update');
    });

    Route::middleware('admin')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    });
});
