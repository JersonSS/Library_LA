<?php

namespace App\Http\Controllers\Api;

use App\Models\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function all(){

        return Genre::all();

    }


    public function create(Request $request){

        Genre::create([
            'name' => $request->name //el ->name puede es el valor  que se inserta del formulario cual es el nombre para capturar los datos
    ]);                             // el 'name_genre es el nombre que se llamada en la base de datos y esta definido en el modelo genre'
    }

    public function update(Request $request, $id){

        $genre = Genre::find($id); //guardar consulta de busqueda o registro (se llama objeto)de id en una variable $genre

        // despues con el objeto, se aplica un metodo update
        $genre->update([
            'name' => $request->input('name'),
        ]);

        return response()->json(['message' => 'El genero a sido actualizado correctamente'], 201);

    }



}
