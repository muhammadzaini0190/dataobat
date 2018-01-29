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
Route::group(['middleware'=>'auth'],function(){
    Route::resource('obat', 'ObatController');
    
});
Route::get('/obat/download-laporan-pdf', 'obatController@getPdf')->name('obat.pdf');






// Route::get('/obat','ObatController@index')->name('obat.index');
// Route::get('/obat/create','ObatController@create')->name('obat.create');
// Route::post('/obat/create','ObatController@store')->name('obat.store');