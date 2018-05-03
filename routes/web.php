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

Route::get('/', 'ScheduleController@index');
Route::get('/team/{team_id}/select/', 'ScheduleController@select');
Route::get('/team', 'ScheduleController@team');
