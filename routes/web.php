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
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['checkroleuserlogin:1']], function(){
        Route::get('/control-panel', 'AdminDashboardController@index')->name('admin.dashboard');
		Route::get('/control-panel/user/', 'AdminDashboardController@profile')->name('admin.dashboard.profile');
        Route::put('/control-panel/user/update', 'AdminDashboardController@profileUpdate')->name('admin.dashboard.profile_update');
        
        Route::get('/control-panel/kriteria', 'KriteriaController@index')->name('kriteria.index');
        Route::get('/control-panel/kriteria/insert', 'KriteriaController@insert')->name('kriteria.insert');
        Route::get('/control-panel/kriteria/data', 'KriteriaController@showdata')->name('kriteria.showdata');
        Route::delete('/control-panel/kriteria/{id}', 'KriteriaController@destroy')->name('kriteria.destroy');
        Route::put('/control-panel/kriteria/{id}', 'KriteriaController@update')->name('kriteria.update');
        Route::get('/control-panel/kriteria/{id}/edit','KriteriaController@edit')->name('kriteria.edit');
        Route::post('/control-panel/kriteria/store','KriteriaController@store')->name('kriteria.store');
        Route::get('/control-panel/kriteria/test','KriteriaController@test')->name('kriteria.test');

        Route::get('/control-panel/pengguna','PenggunaController@index')->name('pengguna.index');
		Route::get('/control-panel/pengguna/data','PenggunaController@showdata')->name('pengguna.showdata');
		Route::get('/control-panel/pengguna/insert','PenggunaController@insert')->name('pengguna.insert');
		
		Route::post('/control-panel/pengguna/store','PenggunaController@store')->name('pengguna.store');
		Route::get('/control-panel/pengguna/{id}/edit','PenggunaController@edit')->name('pengguna.edit');
		Route::put('/control-panel/pengguna/{id}','PenggunaController@update')->name('pengguna.update');
		Route::delete('/control-panel/pengguna/{id}', 'PenggunaController@destroy')->name('pengguna.destroy');
    
        Route::get('/control-panel/tanaman', 'TanamanController@index')->name('tanaman.index');
        Route::get('/control-panel/tanaman/insert', 'TanamanController@insert')->name('tanaman.insert');
        Route::get('/control-panel/tanaman/data', 'TanamanController@showdata')->name('tanaman.showdata');
        Route::delete('/control-panel/tanaman/{id}', 'TanamanController@destroy')->name('tanaman.destroy');
        Route::put('/control-panel/tanaman/{id}', 'TanamanController@update')->name('tanaman.update');
        Route::get('/control-panel/tanaman/{id}/edit','TanamanController@edit')->name('tanaman.edit');
        Route::post('/control-panel/tanaman/store','TanamanController@store')->name('tanaman.store');
        Route::get('/control-panel/tanaman/test','TanamanController@test')->name('tanaman.test');

        Route::get('/control-panel/saw', 'SawController@index')->name('saw.index');
        // Route::get('/control-panel/saw/matrix_nilai', 'SawController@matrix_nilai')->name('saw.matrix_nilai');
        //Route::get('/control-panel/saw/matrix_normalisasi', 'SawController@matrix_normalisasi')->name('saw.matrix_normalisasi');
        // Route::get('/control-panel/saw/matrix_preferensi', 'SawController@matrix_preferensi')->name('saw.matrix_preferensi');
    });
    Route::group(['middleware' => ['checkroleuserlogin:2']], function(){
		Route::get('/my-panel', 'PenggunaDashboardController@index')->name('pengguna.dashboard');
        Route::get('/my-panel/profile', 'PenggunaDashboardController@profile')->name('pengguna.dashboard.profile');
        Route::put('/my-panel/profile', 'PenggunaDashboardController@profileupdate')->name('pengguna.dashboard.profile_update');
        Route::get('/my-panel/saw', 'SawController@index2')->name('saw.index2');
        Route::get('/my-panel/htmltopdfview','SawController@htmltopdfview')->name('saw.htmltopdfview');
        
    });
   
});


// Authentication Routes...
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
