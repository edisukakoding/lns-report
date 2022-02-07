<?php

use App\Http\Controllers\Teacher\ScalaEvaluationController;
use App\Http\Controllers\Admin\ScalaEvaluationSettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher')->middleware(['teacher', 'auth'])->group(function () {
    Route::resource('scalaEvaluationSettings', ScalaEvaluationSettingController::class);
    Route::resource('scalaEvaluations', ScalaEvaluationController::class);
});
