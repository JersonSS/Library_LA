<?php

namespace App\Http\Controllers;

use App\Models\Librarian;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function all(){

        return Librarian::all();
    }
    public function create(Request $request){

        Librarian::create([  
            'librarian_name' => $request->librarian_name,
            'role_id' => $request->role_id
        ]); 
    }

    public function update(Request $request, $id){
        $role = Librarian::find($id);
        $role->update([
            'librarian_name' => $request->input('librarian_name'),
            'role_id' => $request->input('role_id')
        ]);
    
        return response()->json(['message' => 'El Usuario a sido actualizado correctamente'], 201);
    }
}
