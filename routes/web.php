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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'WebController@index')->name('web');
Route::get('/hitung-zakat', 'HitungZakatController@index')->name('hitung-zakat');
Route::post('/hitung-zakat-posts', 'HitungZakatController@hitung_mal')->name('hitung-zakat-post');
Route::post('/hitung-zakat-perbulan-posts', 'HitungZakatController@hitung_perbulan')->name('hitung-zakat-perbulan-post');
Route::post('/hitung-zakat-pertahun-posts', 'HitungZakatController@hitung_pertahun')->name('hitung-zakat-pertahun-post');

Route::prefix('admin')
->namespace('Admin')
->middleware(['auth', 'admin'])
->group(function(){
    Route::get('/', 'DashboardController@index')
    ->name('dashboard');
    Route::get('/data-zakat', 'DataZakatController@index')->name('data-zakat');
    Route::delete('/data-zakat/delete/{id}','DataZakatController@destroy')->name('data-zakat.destroy');
    Route::get('/data-zakat/edit/{id}', 'DataZakatController@edit')->name('edit');
    Route::get('/data-zakat/emas/edit/{id}', 'DataZakatController@edit_emas')->name('edit-emas');
    Route::match(['put', 'patch'], '/data-zakat/edit/{id}','DataZakatController@update')->name('data-zakat.update');
    Route::match(['put', 'patch'], '/data-zakat/emas/edit/{id}','DataZakatController@update_emas')->name('data-zakat.update-emas');
    Route::get('/data-zakat/laporan-tahunan', 'DashboardController@laporan_tahunan')->name('laporan-tahunan');
    Route::get('/data-zakat/laporan-harian', 'DashboardController@laporan_harian')->name('laporan-harian');
    Route::get('/data-zakat/laporan-bulanan', 'DashboardController@laporan_bulanan')->name('laporan-bulanan');
    Route::get('/data-zakat/laporan-zakat-form', 'DashboardController@laporan_zakat_form')->name('laporan-zakat-form');
    Route::get('/data-zakat/laporan-pengeluaran-form', 'DashboardController@laporan_pengeluaran_form')->name('laporan-pengeluaran-form');
    Route::get('/data-zakat/laporan-zakat/{tglawal}/{tglakhir}', 'DashboardController@laporan_zakat_custom')->name('laporan-zakat');
    Route::get('/data-zakat/laporan-pengeluaran/{tglawal}/{tglakhir}', 'DashboardController@laporan_pengeluaran_custom')->name('laporan-pengeluaran');
    Route::get('/pengeluaran/create-pengeluaran', 'PengeluaranController@create')->name('create-pengeluaran');
    Route::post('', 'PengeluaranController@store')->name('create-pengeluaran.store');
    Route::match(['put', 'patch'], '/pengeluaran/edit-pengeluaran/{id}', 'PengeluaranController@update')->name('update-pengeluaran');
    Route::get('/pengeluaran/edit-pengeluaran/{id}', 'PengeluaranController@edit')->name('edit-pengeluaran');
    Route::delete('/pengeluaran/delete/{id}','PengeluaranController@destroy')->name('pengeluaran.destroy');
    Route::get('/pengeluaran', 'PengeluaranController@index')->name('pengeluaran');
});

Route::prefix('user')
->namespace('User')
->middleware(['auth', 'user'])
->group(function(){
    Route::get('/', 'UserController@index')->name('dashboard');
    Route::get('/search', 'UserController@search')->name('search');
    Route::get('/bayar-zakat', 'BayarZakatController@index')->name('bayar-zakat');
    Route::get('/success', 'SuccessController@index')->name('success');
    Route::post('','BayarZakatController@store')->name('bayar-zakat.store');
    Route::get('/invoice/{id}', 'UserController@invoice')->name('invoice');
});

Auth::routes();
