<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['admin', 'auth'])->group(function () {
    Route::resource('classRooms', App\Http\Controllers\Admin\ClassRoomController::class);
    Route::resource('students', App\Http\Controllers\Admin\StudentController::class);
    Route::resource('periodSettings', App\Http\Controllers\Admin\PeriodSettingController::class);
});
