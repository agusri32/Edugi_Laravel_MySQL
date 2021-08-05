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

//untuk form CRUD
Route::resource('admin', 'AdminController');

//untuk form registration
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//untuk form select2
Route::get('/select2', 'Select2Controller@index');
Route::get('/browse',  'Select2Controller@browse');

//untuk focm combobox
Route::get('combobox',		'ComboboxController@index');
Route::get('/getkecamatan', 'ComboboxController@getKecamatan');
Route::get('/getdesa',   	'ComboboxController@getDesa');

//untuk form dropdown
Route::get('dropdown',     'DropdownController@index')->name('dropdown.index');
Route::post('/carikota',   'DropdownController@carikota');
Route::post('/caricamat',  'DropdownController@caricamat');
Route::post('/carilurah',  'DropdownController@carilurah');
Route::post('/prosesdata', 'DropdownController@prosesdata');