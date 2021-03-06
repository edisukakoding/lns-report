<?php

use App\Http\Controllers\Teacher\AnecdoteEvaluationController;
use App\Http\Controllers\Teacher\AnecdoteEvaluationDetailController;
use App\Http\Controllers\Teacher\AspectSettingController;
use App\Http\Controllers\Teacher\AttainmentController;
use App\Http\Controllers\Teacher\AttainmentDetailController;
use App\Http\Controllers\Teacher\EvaluationController;
use App\Http\Controllers\Teacher\NoteAssessmentController;
use App\Http\Controllers\Teacher\ReportController;
use App\Http\Controllers\Teacher\ScalaEvaluationController;
use App\Http\Controllers\Teacher\ScalaEvaluationSettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher')->middleware(['auth', 'teacher'])->group(function () {
    Route::get('/evaluations/getIndicators', [EvaluationController::class, 'getIndicators'])->name('evaluations.getIndicators');
    Route::resource('scalaEvaluationSettings', ScalaEvaluationSettingController::class);
    Route::resource('scalaEvaluations', ScalaEvaluationController::class);
    Route::resource('evaluations', EvaluationController::class);
    Route::resource('attainments', AttainmentController::class);
    Route::resource('attainmentDetails', AttainmentDetailController::class);
    Route::resource('anecdoteEvaluations', AnecdoteEvaluationController::class);
    Route::resource('anecdoteEvaluationDetails', AnecdoteEvaluationDetailController::class);
    Route::resource('aspectSettings', AspectSettingController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('noteAssessments', NoteAssessmentController::class);
});
