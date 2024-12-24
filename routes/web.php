<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\EvaluationEleveController;

Route::resource('eleves', EleveController::class);

Route::get('evaluations/{id}/notes', [EvaluationController::class, 'showNotes'])->name('evaluations.notes');

Route::get('eleves/{id}/notes', [EleveController::class, 'showNotes'])->name('eleves.notes');

Route::get('eleves/sans-moyenne/{evaluationId}', [EleveController::class, 'elevesSansMoyenne'])->name('eleves.sansMoyenne');

Route::resource('evaluations', EvaluationController::class);

Route::resource('modules', ModuleController::class);

Route::get('evaluations/{evaluation}/addNote', [EvaluationEleveController::class, 'addNote'])->name('evaluations.addNote');
Route::post('evaluations/{evaluation}/store-note', [EvaluationEleveController::class, 'storeNote'])->name('evaluations.store-note');
