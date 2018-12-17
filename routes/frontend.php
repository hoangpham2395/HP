<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "frontend" middleware group. Now create something great!
|
*/
//------------------------------------------------------------------------------------
Route::any('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);
Route::post('/update-lang', [
    'as' => 'update.lang',
    'uses' => '\App\Http\Supports\TransController@updateLang'
]);
Route::get('/logs', '\App\Http\Supports\LogViewerController@index')->middleware('log.viewer')->name('frontend.log.viewer');
Route::get('/switch-lang/{lang}', [
    'as' => 'frontend.switch_lang',
    'uses' => '\App\Http\Supports\TransController@switchLang'
]);
authRoutes('frontend');
authRoutes('frontend');