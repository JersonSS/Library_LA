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
            'role_name' => $request->role_name,
        ]); 
    }

    public function update(Request $request, $id){
        $role = Role::find($id);
        $role->update([
            'role_name' => $request->input('role_name'),

        ]);
    
        return response()->json(['message' => 'El Rol a sido actualizado correctamente'], 201);
    }
}
