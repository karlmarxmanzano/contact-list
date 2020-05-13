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
})->middleware('auth');

Auth::routes();

Route::get('/home', 'ContactController@index')->name('home');

Route::resource('contacts', 'ContactController');

Route::get('search', 'SearchController@index')->name('search.index');
Route::get('search-results', 'SearchController@search')->name('search.result');
