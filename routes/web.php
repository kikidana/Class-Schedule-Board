<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SesiKelasController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestAjaxController;
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

Route::get('test', function(){
    return view('testing');
});

Route::get('testJson', [JadwalController::class, 'getMatakuliah']);

Route::get('getMatakuliah', [TestAjaxController::class, 'getAllMatakuliah'])->name('testing.matakuliah');
Route::get('hapusMatakuliah/{id}', [TestAjaxController::class, 'hapusMatakuliah'])->name('testing.hapusMatakuliah');
Route::post('tambahMatakuliah', [TestAjaxController::class, 'addMatakuliah'])->name('testing.addMatakuliah');

Route::get('schedule_board', [SesiKelasController::class, 'index']);
Route::get('get_sesi', [SesiKelasController::class, 'getSesi'])->name('schedule.sesi');
//Route::get('get_status', [SesiKelasController::class, 'getStatus'])->name('schedule.status');

Route::get('sesi_kelas', [SesiKelasController::class, 'tableSesi']);

Route::get('sesi_kelas/{id}/edit', [SesiKelasController::class, 'edit'])->name('sesiKelas.edit');

Route::put('sesi_kelas/{id}', [SesiKelasController::class, 'update'])->name('sesiKelas.update');


Route::post('jadwal', [JadwalController::class, 'storeJadwal'])->name('jadwal.store');
Route::get('jadwal', [JadwalController::class, 'tableJadwal'])->name('jadwal.index');

Route::get('jadwal/tambah', [JadwalController::class, 'tambahJadwal'])->name('jadwal.add');
Route::get('jadwal/{id}/getMatkul', [JadwalController::class, 'getMatakuliah'])->name('jadwal.matkul');

Route::get('form_jadwal', function(){
    return view('formInsertKelas');
});
