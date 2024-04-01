<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function all(){

        return Genre::all();

    }


    public function create(Request $request){

        Genre::create([
            'name_genre' => $request->name_genre //el ->name puede es el valor  que se inserta del formulario cual es el nombre para capturar los datos
    ]);                             // el 'name_genre es el nombre que se llamada en la base de datos y esta definido en el modelo genre'
    }

    public function update(Request $request, $id){

        $genre = Genre::find($id); //guardar consulta de busqueda o registro (se llama objeto)de id en una variable $genre

        // despues con el objeto, se aplica un metodo update 
        $genre->update([
            'name_genre' => $request->input('name_genre'),
        ]);

        return response()->json(['message' => 'El genero a sido actualizado correctamente'], 201);

    }



}
