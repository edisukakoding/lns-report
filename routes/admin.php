<?php

use App\Http\Controllers\Admin\ClassRoomController;
use App\Http\Controllers\Admin\GuardController;
use App\Http\Controllers\Admin\PeriodSettingController;
use App\Http\Controllers\Admin\PersonalController;
use App\Http\Controllers\Admin\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['admin', 'auth'])->group(function () {
    Route::get('/students/assessment/{id}', [StudentController::class, 'assessment'])->name('students.assessment');
    Route::resource('classRooms', ClassRoomController::class);
    Route::resource('students', StudentController::class)->middleware('period');
    Route::resource('periodSettings', PeriodSettingController::class);
    Route::resource('guards', GuardController::class);
    Route::resource('personals', PersonalController::class);
});
