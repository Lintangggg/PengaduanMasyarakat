<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;

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

Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('/proses-login', [AuthController::class, 'ProsesLogin']);

Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register-proses', [AuthController::class, 'ProsesRegister']);

Route::get('/dashboard-admin', [AdminController::class, 'DashboardAdmin']);

Route::get('/dashboard-petugas', [PetugasController::class, 'DashboardPetugas']);
