<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\EvaluationEleveController;

Route::resource('eleves', EleveController::class);

Route::get('evaluations/{id}/notes', [EvaluationController::class, 'showNotes'])->name('evaluations.notes');

Route::get('eleves/{id}/notes', [EleveController::class, 'showNotes'])->name('eleves.notes');

Route::get('eleves/sans-moyenne/{evaluationId}', [EleveController::class, 'elevesSansMoyenne'])->name('eleves.sansMoyenne');
