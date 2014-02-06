<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showStats');
Route::get('/add', function(){
       return View::make('add');
    });
Route::post('/add','HomeController@addStats');
Route::get('/cool_page', function(){
        return View::make('tournament/index');
    });
Route::get('/list', array(
    "as" => "list",
    "uses" => "TournamentsController@Lists"
));
Route::get('/view/{id}', array(
    "as" => "view-specific",
    "uses" => "TournamentsController@View"
));
Route::get('/view_raw/{id}/overview', "TournamentsController@rawOverview");
Route::post('/edit_raw/{id}/overview', "TournamentsController@editOverview");