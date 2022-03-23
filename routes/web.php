<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('role:admin')->get('/pengguna/index', 'PenggunaController@index')->name('index');
Route::middleware('role:admin')->post('/pengguna/create', 'PenggunaController@create')->name('pengguna.create');

// HALAMAN ADMIN
Route::middleware('role:admin')->get('/utama', function() {
    return view('admin.utama');
})->name('utama');
// Route::get('/pengguna', function () {
//     return view('admin.pengguna');
// })->name('pengguna');

// HALAMAN KASIR
Route::middleware('role:kasir')->get('/transaksi', function() {
    return view('kasir.transaksi');
})->name('transaksi');
Route::get('/menu', function () {
    return view('kasir.menu');
});

// HALAMAN MANEJER
Route::middleware('role:manejer')->get('/menu_manejer', function() {
    return view('manejer.menu_manejer');
})->name('menu_manejer');






Route::POST('pengguna/store', [App\Http\Controllers\penggunaController::class, 'store'])->name('store')->middleware('role:Admin');
