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

Route::group(['middleware' => ['web','auth']], function(){
  Route::get('/home', function() {
    if (Auth::user()->admin == 0){
      return view('beranda');
    } else{
      $users['users'] = \App\User::all();
      return view('beranda2', $users);
    }
  })->name('home');
});
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group( function(){
  Route::get('/beranda', 'HomeController@beranda')->name('beranda');
  Route::get('/wawancara', 'WawancaraController@index')->name('wawancara');
  Route::post('/wawancara', 'WawancaraController@storeWawancara')->name('store.wawancara');
  Route::get('/tambahwawancara', 'WawancaraController@create')->name('tambah.wawancara');
  Route::post('/tambahwawancara', 'WawancaraController@store')->name('wawancara.store');
  Route::get('/revisi', 'WawancaraController@showTable')->name('revisi');
  Route::get('/selesai', 'WawancaraController@selesai')->name('selesai');
  Route::get('/jawabpertanyaan', 'WawancaraController@jawabpertanyaan')->name('jawab.pertanyaan');
  Route::post('/jawabpertanyaan', 'WawancaraController@storejawaban')->name('store.jawaban');
  Route::get('/tampil', 'WawancaraController@tampil')->name('get.tampil');
  Route::get('/tampillagi/{id}', 'WawancaraController@show')->name('show.tampil');
  Route::get('/newjawabpertanyaan', 'WawancaraController@new')->name('new.jawab.pertanyaan');
  Route::patch('/wawancara/{id}/update', 'WawancaraController@kirim')->name('kirim.laporan');
  Route::get('/tampiluser/{id}/edit', 'WawancaraController@tampiluseredit')->name('tampil.user.edit');
  Route::patch('/tampiluser/{id}/kirimlagi', 'WawancaraController@tampiluserupdate')->name('update.wawancara');
  Route::patch('/wawancara/{id}/updat', 'WawancaraController@kirimlagi')->name('kirim.laporan.lagi');
});
Route::middleware('is_admin')->group( function(){
  Route::get('/beranda2', 'HomeController@beranda2')->name('beranda2');
  Route::get('/tambahkategori', 'WawancaraController@tambahkategori')->name('tambah.kategori');
  Route::post('/tambahkategori', 'WawancaraController@storekategori')->name('store.kategori');
  Route::get('/tambahpertanyaan', 'WawancaraController@tambahpertanyaan')->name('tambah.pertanyaan');
  Route::post('/tambahpertanyaan', 'WawancaraController@storepertanyaan')->name('store.pertanyaan');
  Route::get('/lapmasuk', 'LaporanController@masuk')->name('masuk');
  Route::get('/laprevisi', 'LaporanController@laprevisi')->name('laprevisi');
  Route::get('/lapselesai', 'LaporanController@lapselesai')->name('lapselesai');
  Route::get('/tampiladmin/{id}/update', 'LaporanController@show')->name('show.tampil.admin');
  Route::patch('/tampiladmin/{id}/updat', 'LaporanController@revisi')->name('revisi.laporan');
  Route::get('/tampiladmin/{id}/update/download', 'LaporanController@download')->name('download');
  Route::patch('/tampiladmin/{id}/update', 'LaporanController@selesai')->name('selesai.laporan');
});
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/profile/{user}/edit', 'ProfileController@editpage')->name('profile.editpage');
Route::patch('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::delete('profil/{user}/edit', 'ProfileController@destroy')->name('avatar.delete');


Route::get('/d', 'WORDController@createWordDocx')->name('download.word');