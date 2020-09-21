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
    return view('top');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::get('home', 'User\CalendarController@index')->name('home');
    
    // 日記画面
    Route::get('diary', 'User\DiaryController@show');
    Route::get('edit', 'User\DiaryController@edit');
    Route::post('edit', 'User\DiaryController@update');
    Route::get('delete', 'User\DiaryController@delete');
    
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
