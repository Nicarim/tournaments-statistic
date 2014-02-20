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
//OLD TWC 2014 STATS
Route::get('/twc_2014', 'HomeController@showStats');
Route::get('/bstats', 'HomeController@showBeatmapStats');
// END OF OLD STATS

Route::get('/', function(){
    return View::make('tournament/index'); // index page
});
Route::get('/list', array(
    "as" => "list",
    "uses" => "TournamentsController@Lists"
));
Route::get('/view/{id}', array(
    "as" => "view-specific",
    "uses" => "TournamentsController@View"
));
Route::post('/settings/{id}', array(
    "uses" => "TournamentsController@editSettings"
));
Route::get('/addtourney', array(
    "as" => "addtourney",
    "uses" => "TournamentsController@viewCreate"
));

Route::post('/addtourney', array(
    "uses" => "TournamentsController@useCreate"
));