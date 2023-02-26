<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\MasyarakatController;
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

// Route::middleware(['auth', 'verified','checkRole:Admin, Masyarakat'])->group(function () {
    
// });
Route::middleware(['auth', 'verified','checkRole:Admin'])->group(function () {
    Route::get('pengaduan', [AdminController::class, 'table'])->name('pengaduan');
    Route::get('petugas', [AdminController::class, 'dataPetugas'])->name('petugas');
    Route::get('masyarakat', [AdminController::class, 'dataMasyarakat'])->name('masyarakat');
    Route::resource('admin', AdminController::class);
});


// Route::middleware(['auth', 'verified','checkRole:Masyarakat'])->group(function () {
//     Route::resource('masyarakat', MasyarakatController::class);
// });
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Route::get('/', [AdminController::class, 'dataTable'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
