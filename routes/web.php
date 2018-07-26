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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/beranda', 'HomeController@beranda')->name('beranda');

Route::get('/profile/{user}/edit', 'ProfileController@index')->name('profile');
Route::get('/wawancara', 'WawancaraController@index')->name('wawancara');
Route::get('/tambahwawancara', 'WawancaraController@create')->name('tambah.wawancara');
Route::post('/tambahwawancara', 'WawancaraController@store')->name('wawancara.store');
Route::get('/revisi', 'WawancaraController@showTable')->name('revisi');
Route::get('/selesai', 'WawancaraController@selesai')->name('selesai');

Route::patch('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::delete('profil/{user}/edit', 'ProfileController@destroy')->name('avatar.delete');

Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');