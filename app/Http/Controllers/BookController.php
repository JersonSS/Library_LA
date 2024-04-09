<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Services\BookServices;

class BookController extends Controller
{

    public function __construct(

        private BookServices $bookServices
    ){
        $this->bookServices = $bookServices;
    }

    public function all()
    {
        return Book::all();
    }

    public function create(Request $request)
    {

        $book = Book::create([

            'title' => $request->title,
            'author_id' => $request->author_id
        ]);
        $book->genres()->attach($request->genres);

        /* EJEMPLO INSERT
   {
        "title": "El túnel",
        "author_id": 8,
        "genres" :[3]
    } */
    }

    public function updateGenre(Request $request, $id)
    {
        $book = Book::find($id);

        $book->genres()->attach($request->genres);

        return "Géneros asociados al libro correctamente";
    }


    public function update(Request $request, $id)
    {

        $book = book::find($id);


        $book->update([
            'title' => $request->input('title'),
            'author_id' => $request->input('author_id'),
        ]);

        return response()->json(['message' => 'El book a sido actualizado correctamente'], 201);
    }

    //falta mejorar
    public function getBooksWithGenres()
    {
        // metodo with se utiliza para cargar relaciones en los modelos
        $books = $this->bookServices->bookInfo();

    
        return BookResource::collection($books);
    }

    




}
