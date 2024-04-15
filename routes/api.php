<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\LoanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(
    [
    'prefix' => 'loan',
    'controller' => LoanController::class,
    'middleware' => 'auth:sanctum'
    ],
    function () {
        Route::get('AllLoans','all')->name('AllLoans');


});

Route::group(
    [
    'prefix' => 'books',
    'controller' => BookController::class
    ],
    function () {

        //Route::post('first_create','firstCreate')->name('first_create');

});
