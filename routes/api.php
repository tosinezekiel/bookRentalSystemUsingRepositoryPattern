<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('Api\Book')->middleware(['return-json'])->group(function () {
    Route::get('/books','BookController@index');
    Route::get('/books/{book}','BookController@show');
});

Route::namespace('Api')->middleware(['return-json','jwt.verify','jwt.auth'])->group(function () {

    Route::get('/me','UserController@me');

});

Route::namespace('Api\Auth')->middleware(['return-json'])->group(function () {
    
    Route::post('/login','AuthController@login');
    Route::post('/logout','AuthController@logout');
    
});


Route::namespace('Api\Book')->middleware(['return-json','jwt.verify','jwt.auth'])->group(function () {

    Route::get('/rents','RentedBookController@getRentedBooks');
    Route::get('/books/{book}/rent','RentedBookController@rentBook');
    Route::get('/rents/{rentedbook}/return','RentedBookController@returnBook');
    Route::get('/rents/{rentedbook}/cancel','RentedBookController@cancelBook');
    Route::get('/rents/{rentedbook}/renew','RentedBookController@renewBook');

});
