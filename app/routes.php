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
    function(){
        return View::make('tournament/list');
}));
Route::get('/view/{id}', array(
    "as" => "view-specific",
    function(){
        $markdown = new Markdown;
        $html = $markdown->render('Markdown **sucks**');
        return View::make('tournament/view')->with('content',$html);
}));