<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProdukController::class, 'index'])->name('index.index');

Route::get('/produk/create', [ProdukController::class, 'create'])->name('index.create');

Route::get('/produk/edit', [ProdukController::class, 'edit'])->name('index.edit');

// Route untuk menyimpan data nya
Route::post('/produk/store', [ProdukController::class, 'store'])->name('index.store');
