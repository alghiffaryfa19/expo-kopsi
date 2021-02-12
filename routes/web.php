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

Route::get('/', 'FrontendController@index')->name('frontend');
Route::get('/bidang/{slug}', 'FrontendController@bidang')->name('bidang');
Route::get('/bidang/{slug}/cari','FrontendController@cari')->name('cari');
Route::get('/bidang/{slug}/{id}', 'FrontendController@karya')->name('detail-karya');
Route::get('/bidangg/{slug}', 'FrontendController@bidangg')->name('bidangg');
Route::post('posts', 'FrontendController@postPost')->name('posts.post');

Auth::routes();

Route::get('/bidang/{slug}/{id}/ulasan', 'FrontendController@ulasan')->name('ulasan');

Route::group(['middleware' => 'auth'],function(){

    Route::get('/home', 'DashboardController@index')->name('dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::resource('bidang', 'BidangController');
    Route::get('bidang/destroy/{id}', 'BidangController@destroy');
    Route::get('bidang/{id}/aspek-nilai', 'AspekNilaiController@index')->name('bidang.aspek_nilai');
    Route::post('bidang/{id}/aspek-nilai/store', 'AspekNilaiController@store')->name('aspek.store');
    Route::put('bidang/{id}/aspek-nilai/update/{nilai}', 'AspekNilaiController@update')->name('updateaspek');
    Route::get('bidang/{id}/aspek-nilai/edit/{nilai}', 'AspekNilaiController@edit')->name('aspek.edit');
    Route::get('bidang/{id}/aspek-nilai/delete/{nilai}', 'AspekNilaiController@destroy')->name('hapusaspek');

    Route::resource('akun-peserta', 'AkunPesertaController');
    Route::get('akun-peserta/destroy/{id}', 'AkunPesertaController@destroy');
    Route::resource('akun-juri', 'AkunJuriController');
    Route::get('akun-juri/destroy/{id}', 'AkunJuriController@destroy');
    Route::resource('profil-peserta', 'ProfilPesertaController');
    Route::get('profil-peserta/destroy/{id}', 'ProfilPesertaController@destroy');
    Route::resource('profil-juri', 'ProfilJuriController');
    Route::get('profil-juri/destroy/{id}', 'ProfilJuriController@destroy');
});

Route::group(['prefix' => 'finalis', 'middleware' => ['auth']], function(){
    Route::resource('tim', 'TimController');
    Route::resource('akunpes', 'AccController');
    Route::resource('karya', 'KaryaController');
});
