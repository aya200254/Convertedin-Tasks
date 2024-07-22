<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StatisticsController;


Route::get('/', function () {
    return redirect('/task/create'); 
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/task/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/task/store', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/statistics', [TaskController::class, 'statistics'])->name('statistics');
