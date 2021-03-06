<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/home', 'homeController@index')->name('home');
Route::get('/', 'homeController@index');

Route::resource('user', 'UserController');
Route::resource('anggota', 'AnggotaController');
Route::get('/anggota_pdf', 'AnggotaController@anggotaPdf');
Route::resource('buku', 'BukuController');
Route::get('/buku_pdf', 'BukuController@bukuPdf');
Route::resource('transaksi', 'TransaksiController');