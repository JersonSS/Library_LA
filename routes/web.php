<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookStatusController;

use App\Models\Author;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// consultas total
Route::get('/prueba', function () {
    return Author::all();
});

Route::get('/test', [AuthorController::class, 'index']);

Route::get('/all',[AuthorController::class,'all']);



// uso de find

Route::get('/single/{id}', function ($id) {
    return Author::find($id);
});


// uso de first

Route::get('/first', function () {
    return Author::where('name','Isabel Allende')->first();
});


// crear autores
Route::post('/insert', [AuthorController::class, 'create']);

Route::post('/insertdate', function (Request $request) { // Request es un un objeto que convierte laravel, se puede acceder a los datos llamandnlo
    Author::create([
        'name' => $request -> input('name')
    ]);
});

// uso del update
Route::put('/update/{id}', function (Request $request, $id) {
    
    $author = Author::find($id);

    $author->update([
        'name' => $request->input('name'),
    ]);

});


//uso de where

Route::get('/where', function () {
    
    return Author::where('name', 'Mario Vargas Llosa')->get();

});

Route::get('/wherein', function () {
    
    return Author::whereIn('id', [1,2,3])->get();

});

Route::get('/wherenotin', function () {
    
    return Author::whereNotIn('id', [1,2,3])->get();

});

Route::get('/between', function () {
    
    return Author::whereBetween('id', [3,5])->get();

});

Route::get('/wherenotnull', function () {
    
    return Author::whereNotNull('name')->get();

});

Route::get('/wherenotnull', function () {
    
    return Author::whereNotNull('name')->get();

});

Route::get('/wherenull', function () {
    
    return Author::whereNull('name')->get();

});



//--------------- Books ---------------------------
Route::group(
    [
    'prefix' => 'books',
    'controller' => BookController::class
    ], 
    function () {
        Route::post('insertbook','create');
        Route::put('updategenre/{id}','updateGenre');
        Route::put('updatebook/{id}', 'update')->name('updatebook');

});

//--------------- Genre ---------------------------
 Route::group(
    [
    'prefix' => 'genres',
    'controller' => GenreController::class
    ], 
    function () {
        Route::get('request','all')->name('request');
        Route::post('insert', 'create')->name('insert');
        Route::put('update/{id}', 'update')->name('update');
       // Route::post('delete', 'delete')->name('delete');

});

//--------------- BookStatus ---------------------------

Route::group(
    [
    'prefix' => 'status',
    'controller' => BookStatusController::class
    ], 
    function () {
        Route::get('allstatus','all')->name('allstatus');
        Route::post('insertstatus', 'create')->name('insertstatus');
});









