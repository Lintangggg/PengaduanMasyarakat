<?php

use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/loginM', [MasyarakatController::class, 'login']);
Route::post('/register', [MasyarakatController::class, 'register']);

Route::get('/masyarakat', [MasyarakatController::class, 'getAllMasyarakat']);
Route::get('/masyarakat/{id}', [MasyarakatController::class, 'getMasyarakatById']);
Route::post('/masyarakat', [MasyarakatController::class, 'createMasyarakat']);
Route::delete('/masyarakat/{id}', [MasyarakatController::class, 'deleteMasyarakat']);
Route::put('/masyarakat/{id}', [MasyarakatController::class, 'updateMasyarakat']);
Route::get('/get-pengaduan/{nik}', [MasyarakatController::class, 'showPengaduanByNIK']);

Route::get('/pengaduan', [PengaduanController::class, 'getAllPengaduan']);
Route::post('/add-pengaduan', [PengaduanController::class, 'createPengaduan']);
