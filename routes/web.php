<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// ROUTE DATA USER CRU (MELIHAT, EDIT)
Route::get('pengguna/index', 'PenggunaController@index')->name('index')->middleware('cekstatus:admin');
Route::post('/pengguna/create', 'PenggunaController@create')->name('pengguna.create')->middleware('cekstatus:admin');
Route::get('pengguna/{id}/edit', 'PenggunaController@edit')->name('pengguna.edit')->middleware('cekstatus:admin');


// HALAMAN ADMIN
Route::get('/utama', function() {
    return view('admin.utama');
})->name('utama')->middleware('cekstatus:admin');


// HALAMAN KASIR
Route::get('/transaksi', function() {
    return view('kasir.transaksi');
})->name('transaksi')->middleware('cekstatus:kasir');

Route::get('/order_menu', function(){
    return view ('kasir.order');
})->name('order')->middleware('cekstatus:kasir');

Route::get('/catatan_transaksi', function(){
    return view ('kasir.catatan_transaksi');
})->name('catatan_transaksi')->middleware('cekstatus:kasir');


// HALAMAN MANEJER
Route::get('/menu_manejer', 'MenuController@index')->name('menu_manejer')->middleware('cekstatus:manejer');

Route::get('menu_manejer/index', 'MenuController@index')->name('andex')->middleware('cekstatus:manejer');
Route::post('/menu_manejer/store', 'MenuController@store')->name('store')->middleware('cekstatus:manejer');
Route::get('menu_manejer/{id}/edit', 'MenuController@edit')->name('menu.edit')->middleware('cekstatus:manejer');
Route::post('menu_manejer/{id}/update', 'MenuController@update')->name('menu.update')->middleware('cekstatus:manejer');
Route::get('menu_manejer/{id}/delete', 'MenuController@delete')->name('menu.delete')->middleware('cekstatus:manejer');
