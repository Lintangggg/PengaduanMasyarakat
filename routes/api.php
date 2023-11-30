<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\MasyarakatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware('auth:sanctum')->get('/petugas', function (Request $request) {
//     return $request->petugas();
// });
// Route::post('/loginP', [PetugasController::class, 'loginAPIPetugas']);

Route::post('/loginM', [MasyarakatController::class, 'login']);
Route::post('/register', [MasyarakatController::class, 'register']);

Route::get('/masyarakat', [MasyarakatController::class, 'getAllMasyarakat']);
Route::get('/masyarakat/{id}', [MasyarakatController::class, 'getMasyarakatById']);
Route::post('/masyarakat', [MasyarakatController::class, 'createMasyarakat']);
Route::delete('/masyarakat/{id}', [MasyarakatController::class, 'deleteMasyarakat']);
Route::put('/masyarakat/{id}', [MasyarakatController::class, 'updateMasyarakat']);

Route::get('/pengaduan', [PengaduanController::class, 'getAllPengaduan']);
Route::get('/get-pengaduan/{nik}', [PengaduanController::class, 'showPengaduanByNIK']);
Route::post('/add-pengaduan', [PengaduanController::class, 'createPengaduan']);
Route::delete('/pengaduan/{id}', [PengaduanController::class, 'deletePengaduan']);

Route::post('/petugas', [PetugasController::class, 'addPetugas']);

Route::get('/tanggapan/{id}', [TanggapanController::class, 'SelectByIdPengaduan']);

