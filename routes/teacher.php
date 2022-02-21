<?php

use App\Http\Controllers\Teacher\AttainmentController;
use App\Http\Controllers\Teacher\AttainmentDetailController;
use App\Http\Controllers\Teacher\EvaluationController;
use App\Http\Controllers\Teacher\ScalaEvaluationController;
use App\Http\Controllers\Teacher\ScalaEvaluationSettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher')->middleware(['teacher', 'auth'])->group(function () {
    Route::get('/evaluations/getScalaEvaluations', [EvaluationController::class, 'getScalaEvaluation'])->name('evaluations.getScalaEvaluations');
    Route::resource('scalaEvaluationSettings', ScalaEvaluationSettingController::class);
    Route::resource('scalaEvaluations', ScalaEvaluationController::class);
    Route::resource('evaluations', EvaluationController::class);
    Route::resource('attainments', AttainmentController::class);
    Route::resource('attainmentDetails', AttainmentDetailController::class);
});
