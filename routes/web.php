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


