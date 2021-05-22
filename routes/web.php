<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SesiKelasController;
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

Route::get('test_database', [SesiKelasController::class, 'test']);

Route::get('schedule_board', [SesiKelasController::class, 'index']);

Route::get('sesi_kelas', [SesiKelasController::class, 'tableSesi']);

Route::get('sesi_kelas/{id}/edit', [SesiKelasController::class, 'edit'])->name('sesiKelas.edit');

Route::put('sesi_kelas/{id}', [SesiKelasController::class, 'update'])->name('sesiKelas.update');

Route::get('form_sesi', function(){
    return view('formSesiKelas');
});
