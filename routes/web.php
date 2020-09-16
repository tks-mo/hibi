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
    Route::get('diary', 'User\DiaryController@diary_show');
    Route::post('diary', 'User\DiaryController@diary_show');
    // 編集画面
    Route::get('edit', 'User\DiaryController@edit_show');
    Route::post('edit', 'User\DiaryController@edit_show');
    // 追加＆更新
    Route::post('diary', 'User\DiaryController@diary_create');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
