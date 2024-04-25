<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\BookCopieController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\BookStatusController;
use App\Http\Controllers\Api\LibrarianController;
use App\Http\Controllers\Api\LoanController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
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

Route::get('/test/{user}', [AuthorController::class, 'test']);

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

//--------------- Authors ---------------------------

Route::group(
    [
    'prefix' => 'authors',
    'controller' => AuthorController::class
    ],
    function () {
        Route::post('insertauthor','create');
        //Route::put('updategenre/{id}','updateGenre');
        //Route::put('updatebook/{id}', 'update')->name('updatebook');

});
//asignar a un usuario a un rol y un metodo--
//pedir perimiso aun usario al tenr un metodo,
// un usuario que no tenga rol asignifa que le salga error

//--------------- Books ---------------------------
/*
Route::group(
    [
    'prefix' => 'books',
    'controller' => BookController::class
    ],
    function () {
        Route::get('allbook','all')->name('allbook');//
        Route::post('insertbook','create')->name('inserbook');
        Route::put('updategenre/{id}','updateGenre');
        Route::put('updatebook/{id}', 'update')->name('updatebook');
        Route::get('allbookgenre','getBooksWithGenres')->name('allbookgenre');
    //cuatro metodos doblemetodo
        Route::post('firstCreate','firstCreate')->name('firstCreate');
        Route::post('firstNew','firstNew')->name('firstNew');
        Route::post('firstOr','firstOr')->name('firstOr');
        Route::post('updateCreate','updateCreate')->name('updateCreate');
        Route::delete('destroy/{book}', 'destroy')->name('destroy');
        Route::put('restore/{id}', 'restore')->name('restore'); //no probado aun


});
*/
//--------------- Genre ---------------------------
 Route::group(
    [
    'prefix' => 'genres',
    'controller' => GenreController::class
    ],
    function () {
        Route::get('request','all')->name('request');
        Route::post('insertgenre', 'create')->name('insert');
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


//--------------- BookStatus ---------------------------
Route::group(
    [
    'prefix' => 'copie',
    'controller' => BookCopieController::class
    ],
    function () {
        Route::get('allcopie','all')->name('allcopie');
        Route::post('insertcopie', 'create')->name('insertcopie');
        Route::put('updatecopie/{id}', 'update')->name('updatecopie');

});


//--------------- Role ---------------------------
/*Route::group(
    [
    'prefix' => 'role',
    'controller' => RoleController::class
    ],
    function () {
        Route::get('allrole','all')->name('allrole');
        Route::post('insertrole', 'create')->name('insertrole');
        Route::put('updaterole/{id}', 'update')->name('updaterole');

});
*/
//--------------- Users ---------------------------
Route::group(
    [
    'prefix' => 'user',
    'controller' => UserController::class
    ],
    function () {
        Route::get('alluser','all')->name('alluser');
        Route::post('insertuser', 'create')->name('insertuser');
        Route::put('updateuser/{id}', 'update')->name('updateuser');

});

//--------------- Librarian ---------------------------
Route::group(
    [
    'prefix' => 'librarian',
    'controller' => LibrarianController::class
    ],
    function () {
        Route::get('alllibra','all')->name('alllibra');
        Route::post('insertlibra', 'create')->name('insertLibra');
        Route::put('updatelibra/{id}', 'update')->name('updatelibra');

});

//--------------- Loan ---------------------------
Route::group(
    [
    'prefix' => 'loan',
    'controller' => LoanController::class
    ],
    function () {
        Route::get('allloans','all')->name('allloans');
        Route::post('insertloan', 'create')->name('insertloan');
        Route::put('updateloan/{id}', 'update')->name('updateloan');
        Route::post('loanstatus', 'newLoanStatus')->name('loanstatus');
        Route::delete('loandelete/{id}', 'deleteLoan')->name('loandelete');

        Route::get('/loans', 'index')->name('loans');



});





