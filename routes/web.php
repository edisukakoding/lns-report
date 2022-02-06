<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

require_once __DIR__ . './admin.php';

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');



















Route::resource('anecdotEvaluations', App\Http\Controllers\AnecdoteEvaluationController::class);


Route::resource('anecdotEvaluationDetails', App\Http\Controllers\AnecdotEvaluationDetailController::class);


Route::resource('evaluations', App\Http\Controllers\EvaluationController::class);


Route::resource('attainments', App\Http\Controllers\AttainmentController::class);


Route::resource('attainmentDetails', App\Http\Controllers\AttainmentDetailController::class);


Route::resource('raports', App\Http\Controllers\RaportController::class);


Route::resource('raportDetails', App\Http\Controllers\RaportDetailController::class);


Route::resource('raportEtcs', App\Http\Controllers\RaportEtcController::class);
