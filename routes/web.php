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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/message', 'MessageController@index')->name('message.index');

Route::get('/message/create', 'MessageController@create')->name('message.create');
Route::post('/message', 'MessageController@store')->name('message.store');

Route::get('/message/{message}/edit', 'MessageController@edit')->name('message.edit');
Route::put('/message/{message}', 'MessageController@update')->name('message.update');

//Route::resource("message", "MessageController");
