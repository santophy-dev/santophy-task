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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'EmployeeController@index');
Route::get('/employees', 'EmployeeController@index');
Route::get('/add', 'EmployeeController@add');
Route::post('/save', 'EmployeeController@save');
Route::get('/delete/{id}', 'EmployeeController@delete');
Route::get('/edit/{id}', 'EmployeeController@edit');
