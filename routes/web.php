<?php

use Illuminate\Support\Facades\Route;

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

//untuk CRUD tabel admin
Route::resource('admin', 'AdminController');

//untuk form dropdown alamat
Route::get('dropdown',     'DropdownController@index')->name('dropdown.index');
Route::post('/carikota',   'DropdownController@carikota');
Route::post('/caricamat',  'DropdownController@caricamat');
Route::post('/carilurah',  'DropdownController@carilurah');
Route::post('/prosesdata', 'DropdownController@prosesdata');

//untuk registration, login, home
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//untuk form select2
Route::get('/select2', 'Select2Controller@index');
Route::get('/browse', 'Select2Controller@browse');