<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function all(){

        return Role::all();
    }
    public function create(Request $request){

        Role::create([  
            'name' => $request->name,
        ]); 
    }

    public function update(Request $request, $id){
        $role = Role::find($id);
        $role->update([
            'name' => $request->input('name'),

        ]);
    
        return response()->json(['message' => 'El Rol a sido actualizado correctamente'], 201);
    }
}
