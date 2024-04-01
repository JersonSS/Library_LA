<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
   

public function create(Request $request){

    $book = Book::create([

        'title'=>$request->title,
        'author_id'=>$request->author_id
    ]);
    $book->genres()->attach($request->genres); 

}


public function updateGenre(Request $request, $id)
{
    $book = Book::find($id); 

    $book->genres()->attach($request->genres);

    return "Géneros asociados al libro correctamente";
}


public function update(Request $request, $id){

    $book = book::find($id);


    $book->update([
        'title' => $request->input('title'),
        'author_id' => $request->input('author_id'),
    ]);

    return response()->json(['message' => 'El book a sido actualizado correctamente'], 201);

}





}
