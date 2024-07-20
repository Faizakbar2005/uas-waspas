<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\ProdukController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::resource('kriteria',KriteriaController::class);
route::resource('produk',ProdukController::class);
Route::get('/hitung', [HitungController::class, 'hitung'])->name('hitung');

