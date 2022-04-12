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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registrationPanel','App\Http\Controllers\RegisterController@index');
Route::get('/coursesDetails','App\Http\Controllers\RegisterController@details');
Route::get('/register/{CourseID}/{CourseName}','App\Http\Controllers\RegisterController@store');
Route::get('/delete/{CourseID}','App\Http\Controllers\RegisterController@delete');
Route::get('/login','App\Http\Controllers\RegisterController@login');
Route::get('/loginCheck','App\Http\Controllers\RegisterController@loginCheck');
