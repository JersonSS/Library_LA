<?php

namespace App\Http\Controllers;

use App\Models\BookCopie;
use Illuminate\Http\Request;

class BookCopieController extends Controller
{
    public function all(){

        return BookCopie::all();
    }
    public function create(Request $request){

        BookCopie::create([  
            'book_id' => $request->book_id,
            'status_id' => $request->status_id
        ]); 
    }

    public function update(Request $request, $id){
        $copie = BookCopie::find($id);
        $copie->update([
            'book_id' => $request->input('book_id'),
            'status_id' => $request->input('status_id'),
        ]);
    
        return response()->json(['message' => 'La copia del Libro a sido actualizado correctamente'], 201);
    }
}
