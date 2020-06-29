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

Route::get('/{any}', function () {
    return view('welcome');
})->where('any','.*');

Auth::routes();

Route::get('/user',function (Request $request) {
	
	$users = App\User::all();
	
	return response()->json(['users' => $users]);

});

Route::get('/example', function () {
    return view('example');
});