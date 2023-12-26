<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\DashboardController;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// DASHBOARD
Route::get('/', [DashboardController::class, 'index'])->name('Home');
// SAMPAH
Route::get('/HalamanSampah', [SampahController::class, 'index'])->name('Sampah');
Route::get('/TambahSampah', [SampahController::class, 'create'])->name('sampah.create');
Route::post('/TambahSampah', [SampahController::class, 'store'])->name('sampah.store');
Route::get('/sampah/{id}/edit', [SampahController::class, 'edit'])->name('sampah.edit');
Route::put('/sampah/{sampah}', [SampahController::class, 'update'])->name('sampah.update');
Route::get('/sampah/{id}', [SampahController::class, 'show'])->name('sampah.show');
Route::delete('/sampah/{sampah}', [SampahController::class, 'destroy'])->name('sampah.destroy');



// UNIT 
Route::get('/HalamanUnit', [UnitController::class, 'index'])->name('Unit');
Route::get('/TambahUnit', [UnitController::class, 'create'])->name('unit.create');
Route::group(['prefix' => 'unit'], function () {
    Route::get('/getLocations', [UnitController::class, 'getLocations'])->name('unit.getLocations');
    Route::post('/store', [UnitController::class, 'store'])->name('unit.store');
});
Route::get('/unit/{id}', [UnitController::class, 'show'])->name('unit.show');
Route::get('/unit/{id}/edit', [UnitController::class, 'edit'])->name('unit.edit');
Route::put('/unit/{unit}', [UnitController::class, 'update'])->name('unit.update');
Route::delete('/unit/{unit}', [UnitController::class, 'destroy'])->name('unit.destroy');


// SATUAN
Route::get('/HalamanSatuan', [SatuanController::class, 'index'])->name('Satuan');
Route::get('/TambahSatuan', [SatuanController::class, 'create'])->name('satuan.create');
Route::post('/TambahSatuan', [SatuanController::class, 'store'])->name('satuan.store');
Route::get('/satuan/{id}/edit', [SatuanController::class, 'edit'])->name('satuan.edit');
Route::put('/satuan/{satuan}', [SatuanController::class, 'update'])->name('satuan.update');
Route::delete('/satuan/{satuan}', [SatuanController::class, 'destroy'])->name('satuan.destroy');
// STATUS
Route::get('/HalamanStatus', [StatusController::class, 'index'])->name('Status');
Route::get('/TambahStatus', [StatusController::class, 'create'])->name('status.create');
Route::post('/TambahStatus', [StatusController::class, 'store'])->name('status.store');
Route::get('/status/{id}/edit', [StatusController::class, 'edit'])->name('status.edit');
Route::put('/status/{status}', [StatusController::class, 'update'])->name('status.update');
Route::delete('/status/{status}', [StatusController::class, 'destroy'])->name('status.destroy');
// Jadwal
Route::get('/HalamanHari', [JadwalController::class, 'index'])->name('Jadwal');
Route::get('/TambahHari', [JadwalController::class, 'create'])->name('jadwals.create');
Route::post('/TambahHari', [JadwalController::class, 'store'])->name('jadwals.store');
Route::delete('/jadwals/{jadwal}', [JadwalController::class, 'destroy'])->name('jadwals.destroy');
Route::get('/jadwals/{jadwal}/edit', [JadwalController::class, 'edit'])->name('jadwals.edit');
Route::put('/jadwals/{jadwal}', [JadwalController::class, 'update'])->name('jadwals.update');
// JENIS
Route::get('/HalamanJenis', [JenisController::class, 'index'])->name('Jenis');
Route::get('/TambahJenis', [JenisController::class, 'create'])->name('jenis.create');
Route::post('/TambahJenis', [JenisController::class, 'store'])->name('jenis.store');
Route::get('/jenis/{id}/edit', [JenisController::class, 'edit'])->name('jenis.edit');
Route::put('/jenis/{jenis}', [JenisController::class, 'update'])->name('jenis.update');
Route::delete('/jenis/{jenis}', [JenisController::class, 'destroy'])->name('jenis.destroy');





















   