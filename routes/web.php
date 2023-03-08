<?php

use App\Http\Controllers\tareasController;
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

Route::get('/', function () {
    return view('tareas.index');
});

Route::get('/tareas',[tareasController::class,'index'])->name('tareas');

Route::post('/tareas',[tareasController::class,'store'])->name('tareas');

Route::get('/tareas?id={id}',[tareasController::class,'show'])->name('tareas-show');

Route::patch('/tareas',[tareasController::class,'store'])->name('tareas-edit');

Route::delete('/tareas',[tareasController::class,'store'])->name('tareas-destroy');