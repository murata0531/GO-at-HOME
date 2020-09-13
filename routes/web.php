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

// Route::get('/home/shared', function () {
//     return view('shared');
// })->middleware('auth');

Auth::routes();
Route::post('/userlogout','RegisterController@userlogout');

Route::get('home{any}', 'HomeController@index')->where('any','.*')->name('home');

Route::post('/userupdate', 'HomeController@store');
Route::get('video', function() {
    return view('video');
})->middleware('auth');
