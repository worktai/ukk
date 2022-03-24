<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// ROUTE DATA USER CRU (MELIHAT, EDIT)
Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('role:admin')->get('pengguna/index', 'PenggunaController@index')->name('index');
Route::middleware('role:admin')->post('/pengguna/create', 'PenggunaController@create')->name('pengguna.create');
Route::middleware('role:admin')->get('pengguna/{id}/edit', 'PenggunaController@edit')->name('pengguna.edit');


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
Route::middleware('role:manejer')->get('/menu_manejer', 'MenuController@index')->name('menu_manejer');

Route::middleware('role:manejer')->get('menu/index', 'MenuController@index')->name('index');
Route::middleware('role:manejer')->post('/menu/create', 'MenuController@create')->name('create');
Route::middleware('role:manejer')->post('/menu/store', 'MenuController@store')->name('store');







// Route::POST('pengguna/store', [App\Http\Controllers\penggunaController::class, 'store'])->name('store')->middleware('role:Admin');
