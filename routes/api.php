<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\LoanController;
use App\Http\Controllers\Api\BookPhotoController;
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
    'controller' => BookController::class,
    'middleware' => 'auth:sanctum',
    ],
    function () {
        Route::get('allbook', [BookController::class, 'all'])->name('allbook');
        Route::get('allbookgenre',[BookController::class, 'getBooksWithGenres'])->name('allbookgenre');


});

Route::group(
    [

    'controller' => BookPhotoController::class,
    'as' =>'books.photo'
    //'middleware' => 'auth:sanctum',
    ],
    function () {
        Route::get('photos','index')->name('index');
        Route::post('book/photos/file','storeFile')->name('store.file');
        Route::post('photos/base64','storeBase64')->name('base64.store');

});


Route::post('/post', function () {
    // Ruta de la imagen que deseas convertir a base64
    $ruta_imagen = 'C:\Users\Jerson\Desktop\laravel\PROYECTOS - ED\LibraryLA\storage\app\public\images\Anotación 2024-04-25 115117.png';

    // Verifica si la imagen existe
    if (file_exists($ruta_imagen)) {
        // Lee el contenido de la imagen en un string
        $imagen_string = file_get_contents($ruta_imagen);

        // Convierte el contenido de la imagen a base64
        $imagen_base64 = base64_encode($imagen_string);

        // Muestra o utiliza el resultado (en este caso, se muestra en la pantalla)
        echo $imagen_base64;
    } else {
        echo 'La imagen no existe en la ruta especificada.';
    }

});

