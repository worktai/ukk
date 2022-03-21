<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('role:admin')->get('/dashboard', function() {
    return view('admin.utama');
})->name('dashboard');
Route::get('/apegawai', function () {
    return view('admin.pegawai');
});

Route::middleware('role:kasir')->get('/transaksi', function() {
    return view('kasir.transaksi');
})->name('transaksi');
Route::get('/menu', function () {
    return view('kasir.menu');
});


