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
    Route::get('diary', 'User\DiaryController@show');
    // 日記
    Route::get('edit/{selectedDate?}', 'User\DiaryController@edit');
    Route::post('edit', 'User\DiaryController@update');
    Route::get('diary_delete', 'User\DiaryController@diary_delete');
    // スケジュール
    Route::get('create/{selectedDate?}', 'User\ScheduleController@create');
    Route::post('create', 'User\ScheduleController@store');
    Route::get('schedule_delete', 'User\ScheduleController@schedule_delete');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
