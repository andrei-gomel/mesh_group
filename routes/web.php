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

Route::get('/', [App\Http\Controllers\RowsController::class, 'index'])->name('index');
Route::get('/format_data', [App\Http\Controllers\RowsController::class, 'formatData'])->name('format_data');
Route::post('/import', [App\Http\Controllers\RowsController::class,'import'])->name('import');
