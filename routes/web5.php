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

// Route::group(['middleware' => ['web','auth']], function(){
//   Route::get('/home', function() {
//     if (Auth::user()->admin == 0){
//       return view('beranda');
//     } else{
//       $users['users'] = \App\User::all();
//       return view('beranda2', $users);
//     }
//   })->name('home');
// });



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@index')->name('home.store');
Route::get('/agenda', 'HomeController@edit')->name('home.edit');
//Route::resource('/home', 'HomeController')->name('home');


Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::get('query', 'WawancaraController@search')->name('query');
Route::get('admin/query', 'LaporanController@search')->name('admin.query');

// Route::middleware('auth')->group( function(){
  //Route::get('/beranda', 'HomeController@beranda')->name('beranda');
  Route::get('/wawancara', 'WawancaraController@index')->name('wawancara');
  Route::post('/wawancara/wawancara', 'WawancaraController@storeWawancara')->name('store.wawancara');
  Route::post('/wawancara/rangkuman', 'WawancaraController@storeRangkuman')->name('store.rangkuman');

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
  Route::get('/rangkuman', 'WawancaraController@rangkuman')->name('rangkuman');
  Route::patch('/rangkuman', 'WawancaraController@kirimrangkuman')->name('kirim.rangkuman');
// });
// Route::middleware('is_admin')->group( function(){
  //Route::get('/beranda2', 'HomeController@beranda2')->name('beranda2');
  Route::get('/tambahkategori', 'LaporanController@tambahkategori')->name('tambah.kategori');
  Route::post('/tambahkategori', 'LaporanController@storekategori')->name('store.kategori');
  Route::patch('/tambahkategori/{id}/update', 'LaporanController@updatekategori')->name('update.kategori');
  Route::delete('/tambahkategori/{id}/delete', 'LaporanController@categorydestroy')->name('category.destroy');
  Route::get('/tambahpertanyaan', 'LaporanController@tambahpertanyaan')->name('tambah.pertanyaan');
  Route::post('/tambahpertanyaan', 'LaporanController@storepertanyaan')->name('store.pertanyaan');
  Route::patch('/tambahpertanyaan/{id}/update', 'LaporanController@updatepertanyaan')->name('update.pertanyaan');
  Route::delete('/tambahpertanyaan/{id}/delete', 'LaporanController@pertanyaandestroy')->name('pertanyaan.destroy');
  Route::get('/manageuser', 'LaporanController@manageuser')->name('manage.user');
  Route::delete('/manageuser/{id}/delete', 'LaporanController@manageuserdestroy')->name('manage.user.destroy');
  Route::delete('/lapselesai/{id}/delete', 'LaporanController@postdestroy')->name('post.destroy');
  Route::get('/lapmasuk', 'LaporanController@masuk')->name('masuk');
  Route::get('/laprevisi', 'LaporanController@laprevisi')->name('laprevisi');
  Route::get('/lapselesai', 'LaporanController@lapselesai')->name('lapselesai');
  Route::get('/tampiladmin/{id}/update', 'LaporanController@show')->name('show.tampil.admin');
  Route::patch('/tampiladmin/{id}/updat', 'LaporanController@revisi')->name('revisi.laporan');
  Route::get('/tampiladmin/{id}/update/download', 'LaporanController@download')->name('download');
  Route::patch('/tampiladmin/{id}/update', 'LaporanController@selesai')->name('selesai.laporan');
// });
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/profile/{user}/edit', 'ProfileController@editpage')->name('profile.editpage');
Route::patch('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::delete('profil/{user}/edit', 'ProfileController@destroy')->name('avatar.delete');

Route::get('/adminprofile', 'AdminProfileController@index')->name('admin.profile');
Route::get('/adminprofile/{user}/edit', 'AdminProfileController@editpage')->name('admin.profile.editpage');
Route::patch('/adminprofile/{user}/edit', 'AdminProfileController@edit')->name('admin.profile.edit');
Route::delete('adminprofil/{user}/edit', 'AdminProfileController@destroy')->name('admin.avatar.delete');

Route::patch('/tampiladmin/{id}/word', 'WORDController@createWordDocx')->name('download.word');

Route::delete('/admin/delete/{user}', 'AdminController@usersdestroy')->name('usersadmin.destroy');

Route::resource('/tasks', 'TasksController');

Route::get('events', 'EventController@index');