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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/beranda', 'HomeController@beranda')->name('beranda');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/profile/{user}/edit', 'ProfileController@editpage')->name('profile.editpage');
Route::get('/wawancara', 'WawancaraController@index')->name('wawancara');
Route::post('/wawancara', 'WawancaraController@storeWawancara')->name('store.wawancara');

Route::get('/tambahwawancara', 'WawancaraController@create')->name('tambah.wawancara');
Route::post('/tambahwawancara', 'WawancaraController@store')->name('wawancara.store');
Route::get('/revisi', 'WawancaraController@showTable')->name('revisi');
Route::get('/selesai', 'WawancaraController@selesai')->name('selesai');

Route::patch('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::delete('profil/{user}/edit', 'ProfileController@destroy')->name('avatar.delete');

Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');


Route::get('/tambahkategori', 'WawancaraController@tambahkategori')->name('tambah.kategori');
Route::post('/tambahkategori', 'WawancaraController@storekategori')->name('store.kategori');

Route::get('/tambahpertanyaan', 'WawancaraController@tambahpertanyaan')->name('tambah.pertanyaan');
Route::post('/tambahpertanyaan', 'WawancaraController@storepertanyaan')->name('store.pertanyaan');

Route::get('/jawabpertanyaan', 'WawancaraController@jawabpertanyaan')->name('jawab.pertanyaan');
Route::post('/jawabpertanyaan', 'WawancaraController@storejawaban')->name('store.jawaban');


Route::get('/tampil', 'WawancaraController@tampil')->name('get.tampil');
Route::get('/tampillagi/{id}', 'WawancaraController@show')->name('show.tampil');
