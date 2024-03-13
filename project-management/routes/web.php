<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





use App\Http\Controllers\ProjectController;

Route::get('/', [ProjectController::class, 'index'])->name('projects.index');

// Creazione di un nuovo progetto,si mettono quelle piu specifiche prima
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

// Modifica di un progetto esistente
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');

// Visualizzazione dei dettagli di un singolo progetto
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Eliminazione di un progetto
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
