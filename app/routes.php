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
    "as" => "tourney",
    "uses" => "TournamentsController@View"
));

Route::get('/addtourney', array(
    "as" => "addtourney",
    "uses" => "TournamentsController@viewCreate"
));

Route::post('/addtourney', array(
    "uses" => "TournamentsController@useCreate"
));
Route::get('/settings/{id}/{type?}', array(
    "uses" => "TournamentsController@viewSettings",
    "as" => "settings",
    "before" => "auth"
));
Route::post('/settings/{id}/{type}', array(
        "uses" => "TournamentsController@editSettings",
        "before" => "auth"
    ));
Route::get('/login/{login}/{password}', array(
       "uses" => "TournamentsController@login",
       "as" => "login",
       "before" => "guest"
    ));
Route::group(array(
        "prefix" => "results"
    ), function(){
        Route::get('/view/{id}/{stageId?}/{groupId?}', array(
               "uses" => "TournamentsController@viewResults",
               "as" => "results"
            ));
        Route::get('/admin/{id}', array(
               "uses" => "TournamentsController@viewAdminResults",
               "before" => "auth"
            ));
        Route::post('/admin/{id}/{type}', array(
               "uses" => "TournamentController@postResults",
               "before" => "auth"
            ));

    });