<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "backend" middleware group. Now create something great!
|
*/
Route::get('/', [
    'as' => 'admin.index',
    'uses' => 'AdminController@index'
]);

Route::resource('admin', 'AdminController');

Route::post('pl-import/import', [
    'as' => 'pl.import.import',
    'uses' => 'PlImportController@import'
]);

Route::get('table-columns/{table}', [
    'as' => 'pl.import.table.columns',
    'uses' => 'PlImportController@getTableColumns'
]);
Route::resource('pl-import', 'PlImportController');

authRoutes('backend');