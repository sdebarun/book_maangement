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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/newhome','NewhomeController@index')->name('home');
Route::group(['prefix'=>'author'], function(){
    Route::get('/add','AuthorController@addAuthor')->name('add');
    Route::post('/doAddauthor','AuthorController@createAuthor');
});
