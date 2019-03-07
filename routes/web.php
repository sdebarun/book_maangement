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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/newhome','NewhomeController@index')->name('home');

Route::group(['prefix'=>'author','middleware'=>'auth'], function($id){
    Route::get('/add','AuthorController@addAuthor')->name('add');
    Route::post('/doAddauthor','AuthorController@createAuthor');
    Route::get('/viewall','AuthorController@listAuthors');
    Route::post('/delete/{id}','AuthorController@deleteAuthor')->name('author.delete');
    Route::get('/edit/{id}','AuthorController@editAuthor');
    Route::post('/doedit/{id}','AuthorController@doeditAuthor');
});

Route::group(['prefix'=>'publisher','middleware'=>'auth'],function($id){
    Route::get('/add','PublishersController@viewaddPublisher');
    Route::post('/doAddPublisher','PublishersController@createPublisher');
    Route::get('/viewall','PublishersController@listPublishers');
    Route::post('/delete/{id}','PublishersController@deletePublisher')->name('publisher.delete');
    Route::get('/edit/{id}','PublishersController@editPublisher');
    Route::post('/doedit/{id}','PublishersController@doeditPublisher');
});

Route::group(['prefix'=>'books','middleware'=>'auth'],function($id){
    Route::get('/add','BookController@AddNewBooks');
    Route::post('/doAddbook','BookController@doAddbook');
    Route::get('/viewall','BookController@viewAllbooks');
    Route::post('/delete/{id}','BookController@deleteBook')->name('books.delete');
    Route::get('/edit/{id}','BookController@editBook');
    Route::post('/doedit/{id}','BookController@doEditbook');
});
Route::group(['prefix'=>'paginated','middleware'=>'auth'],function(){
    Route::get('books','BookController@viewAllbooksPaginated');
    Route::post('filtered','BookController@viewfilteredData');
    Route::get('author','AuthorController@viewPaginatedlist');
    Route::get('filteredAuthor','AuthorController@viewfilteredData');
});
Route::group(['prefix'=>'bookmarks','middleware'=>'auth'],function(){
    Route::get('add',"BookmarkController@addMark");
    Route::post('doaddmark','BookmarkController@doaddmark');
});

Route::get('routeprefix','PublishersController@checkPrefixRoute');
Route::get('routeisapi','PublishersController@checkIsapi');