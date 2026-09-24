<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// home page goes to the task list
Route::get('/', [TaskController::class, 'index']);

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::patch('/tasks/{id}/status', [TaskController::class, 'updateStatus'])->name('tasks.status');