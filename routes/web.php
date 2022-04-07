<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ManejerController;

Route::get('/', function () {
    return view('/welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// HALAMAN ADMIN
Route::get('/aktivitas', 'AktivitasController@aktivitas')->name('aktivitas')->middleware('cekstatus:admin');

// ADMIN ( ROUTE DATA USER CRU (MELIHAT, EDIT) )
Route::middleware('role:admin')->get('pengguna/index', 'PenggunaController@index')->name('index');
Route::middleware('role:admin')->post('/pengguna/create', 'PenggunaController@create')->name('pengguna.create');
Route::middleware('role:admin')->get('pengguna/{id}/edit', 'PenggunaController@edit')->name('pengguna.edit');
Route::middleware('role:admin')->get('pengguna/{id}/delete', 'PenggunaController@destroy')->name('pengguna.destroy');

Route::middleware('role:admin')->get('pengguna/edit/{id}', 'PenggunaController@edit');
Route::middleware('role:admin')->post('pengguna/edit/{id}', 'PenggunaController@update');




// HALAMAN KASIR
Route::middleware('role:kasir')->get('/catatan_transaksi', 'KasirController@show')->name('catatan_transaksi');

// KASIR -> FOLDER PELANGGAN -> HALAMAN ORDER DAN TRANSAKSI:
Route::middleware('role:kasir')->resource('dpesan','KasirController');
Route::middleware('role:kasir')->post('pelanggan.index', 'KasirController@simpan')->name('simpan');
// Route::middleware('role:kasir')->get('', 'KasirController@')->name('simpan');



// HALAMAN MANEJER
// MANEJER -> HALAMAN CATATAN TRANSAKSI PENCARIAN MELALUI TANGGAL DAN NAMA
Route::middleware('role:manejer')->get('/note', 'ManejerController@laporantransaksi')->name('laporantransaksi');
Route::middleware('role:manejer')->get('caritgl','ManejerController@caritgl')->name('caritgl');
Route::middleware('role:manejer')->get('tgltertentu','ManejerController@tgltertentu')->name('tgltertentu');


// MANEJER -> HALAMAN LAPORAN HARIAN DAN BULANAN
Route::middleware('role:manejer')->get('/laporharibulan', 'ManejerController@laporharibulan')->name('laporharibulan');


// MANEJER -> HALAMAN DATA KATAGORI. CONTOHNYA MAKANAN/MINUMAN
route::middleware('role:manejer')->resource('kategori','KategoriController');

// MANEJER -> HALAMAN DATA MENU. CONTOHNYA NASI PADANG
route::middleware('role:manejer')->resource('menu','MenuController');    
// Route::get('/menu/edit/{id}', 'MenuController@edit');
Route::middleware('role:manejer')->post('/menu/edit/{id}', 'MenuController@update');




// MANEJER -> HALAMAN DATA MEJA
route::middleware('role:manejer')->resource('meja','MejaController');

// MANEJER -> LOG AKTIVITAS PEGAWAI DI HALAMAN MANEJER
Route::get('/aktivitaspegawai', 'AktivitasController@aktivitas2')->name('aktivitaspegawai');

