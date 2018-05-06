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


/**
 * Teammate
 */

# READ & CREATE
# Show the form to add a new teammate
Route::get('/team', 'TeamController@team');

# Process the form to add a new teammate
Route::post('/team/create', 'TeamController@create');

# UPDATE
# Show the form to edit a specific teammate
Route::get('/team/{team_id}/edit/', 'TeamController@edit');

# Process the form to edit a specific teammate
Route::put('/team/{team_id}', 'TeamController@update');

# DELETE
# Show the page to confirm deletion of a teammate
Route::get('/team/{id}/delete', 'TeamController@delete');

# Process the deletion of a teammate
Route::delete('/team/{id}', 'TeamController@destroy');


