<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\EvaluationEleveController;
use App\Http\Controllers\HomeController;

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('evaluations', EvaluationController::class);
    Route::resource('modules', ModuleController::class);

    Route::get('evaluations/{evaluation}/addNote', [EvaluationEleveController::class, 'addNote'])->name('evaluations.addNote');
    Route::post('evaluations/{evaluation}/store-note', [EvaluationEleveController::class, 'storeNote'])->name('evaluations.store-note');
    Route::get('evaluations/{id}/eleves-sans-moyenne', [EvaluationEleveController::class, 'elevesSansMoyenne'])->name('evaluations.elevesSansMoyenne');
    Route::get('evaluations/{id}/notes', [EvaluationController::class, 'showNotes'])->name('evaluations.notes');

    Route::resource('eleves', EleveController::class);
    Route::get('eleves/{id}/notes', [EleveController::class, 'showNotes'])->name('eleves.notes');
});
