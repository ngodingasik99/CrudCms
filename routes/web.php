<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('home');
});
Route::middleware(['auth'])->group(function(){
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori/store', [KategoriController::class, 'store']);
Route::put('/kategori/{id}', [KategoriController::class, 'action']);
Route::get('/kategori/{id}', [KategoriController::class, 'distroy']);

Route::get('/produk', [ProdukController::class, 'index']);
Route::post('/produk/store', [produkController::class, 'store']);
Route::put('/produk/{id}', [produkController::class, 'action']);
Route::get('/produk/{id}', [ProdukController::class, 'distroy']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
