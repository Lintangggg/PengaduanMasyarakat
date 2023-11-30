<?php

use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TanggapanController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    $data = Pengaduan::all();
    return view('dashboard', compact('data'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tanggapan', function () {
    $data = Tanggapan::all();
    return view('tanggapan', compact('data'));
})->middleware(['auth', 'verified'])->name('tanggapan');

Route::get('/petugas', function () {
    $data = User::all();
    return view('petugas', compact('data'));
})->middleware(['auth', 'verified'])->name('petugas');

Route::get('/masyarakat', function () {
    $data = Masyarakat::all();
    return view('masyarakat', compact('data'));
})->middleware(['auth', 'verified'])->name('masyarakat');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/update-status/{id}', [PetugasController::class, 'updateStatus']);

Route::get('/form-tanggapan/{id}', [TanggapanController::class, 'FormTanggapan'])->name('form.tanggapan');
Route::post('/form-tanggapan-add', [TanggapanController::class, 'AddTanggapan'])->name('add.tanggapan');

Route::get('/form-edit-petugas/{id}', [PetugasController::class, 'UpdatePetugas'])->name('edit-petugas');
Route::post('/proses-edit-petugas/{id}', [PetugasController::class, 'ProsesUpdate'])->name('proses-edit-petugas');
Route::post('/delete-petugas/{id}', [PetugasController::class, 'DeletePetugas'])->name('delete-petugas');

Route::get('/form-edit-masyarakat/{id}', [AdminController::class, 'UpdateMasyarakat'])->name('edit-masyarakat');
Route::post('/proses-edit-masyarakat/{id}', [AdminController::class, 'ProsesUpdate'])->name('proses-edit-masyarakat');
Route::post('/delete-masyarakat/{id}', [AdminController::class, 'DeleteMasyarakat'])->name('delete-masyarakat');
