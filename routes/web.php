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

use App\Book;
use Illuminate\Http\Request;

/**
* コーヒーの一覧表示(coffees.blade.php)
*/
Route::get('/', function () {
    return view('coffees');
});

/**
* コーヒーを追加 
*/
Route::post('/coffees', function (Request $request) {
    //
});

/**
* コーヒーを削除 
*/
Route::delete('/coffee/{coffee}', function (coffee $coffee) {
    //
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

