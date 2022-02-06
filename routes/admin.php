<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['admin', 'auth'])->group(function () {
    Route::resource('classRooms', App\Http\Controllers\Admin\ClassRoomController::class);
    Route::resource('students', App\Http\Controllers\Admin\StudentController::class)->middleware('period');
    Route::resource('periodSettings', App\Http\Controllers\Admin\PeriodSettingController::class);
    Route::resource('scalaEvaluationSettings', App\Http\Controllers\Admin\ScalaEvaluationSettingController::class);
    Route::resource('guards', App\Http\Controllers\Admin\GuardController::class);
    Route::resource('personals', App\Http\Controllers\Admin\PersonalController::class);
});
