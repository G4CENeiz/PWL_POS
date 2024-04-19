<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);

Route::get('/kategori', [KategoriController::class, 'index'])->name('/kategori');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('/kategori/create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('/kategori/store');
Route::get('/kategori/update/{id}', [KategoriController::class, 'update'])->name('/kategori/update');
Route::put('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('/kategori/edit');
Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('/kategori/delete');

// Route::get('/user', [UserController::class, 'index'])->name('/user');
// Route::get('/user/tambah', [UserController::class, 'tambah'])->name('/user/tambah');
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah'])->name('/user/ubah');
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('/user/hapus');
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('/user/tambah_simpan');
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan'])->name('/user/ubah_simpan');

// UTS
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'tambah'])->name('user.create');
Route::post('/user', [UserController::class, 'tambah_simpan'])->name('user.store');
Route::get('/user/update/{id}', [UserController::class, 'ubah'])->name('user.update');
Route::put('/user/edit/{id}', [UserController::class, 'ubah_simpan'])->name('user.edit');
Route::get('/user/delete/{id}', [UserController::class, 'hapus'])->name('user.delete');
