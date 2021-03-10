<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'PagesController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/templates/start', 'TemplateController@start_template');

Route::post('/templates/structure', 'TemplateController@structure');

Route::post('/templates/scheme', 'TemplateController@scheme');

//Route::post('/startAdvertising', 'TemplateController@start');

//Route::post('/generateTemplate', 'TemplateController@generateTemplate');

Route::post('/templates/save', 'TemplateController@save');



