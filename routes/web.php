<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/kasir', function () {
    return view('kasir');
});

Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan halaman form tambah produk
Route::get('/products/create', function () {
    return view('products.create');
})->name('products.create');

// Route untuk memproses data dari form dan upload gambar
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Route sementara agar redirect setelah berhasil simpan tidak error
Route::get('/products', function () {
    return "Produk dan gambar berhasil ditambahkan!";
})->name('products.index');