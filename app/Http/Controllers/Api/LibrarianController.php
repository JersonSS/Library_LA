<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Librarian;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function all(){

        return Librarian::all();
    }
    public function create(Request $request){

        Librarian::create([
            'name' => $request->librarian_name,
            'role_id' => $request->role_id
        ]);
    }

    public function update(Request $request, $id){
        $role = Librarian::find($id);
        $role->update([
            'name' => $request->input('name'),
            'role_id' => $request->input('role_id')
        ]);

        return response()->json(['message' => 'El Usuario a sido actualizado correctamente'], 201);
    }
}
