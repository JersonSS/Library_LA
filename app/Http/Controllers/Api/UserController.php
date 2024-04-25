<?php

namespace App\Http\Controllers\Api;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Permission;


class UserController extends Controller
{
    public function all(){

        return User::all();
    }
    public function create(Request $request){

        User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'email' => $request->email,
            'password' => $request->password
        ]);
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->update([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'age' => $request->input('age'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),

        ]);
        $user->assignRole(RoleEnum::ADMIN);

        return response()->json(['message' => 'El Usuario a sido actualizado correctamente'], 201);
    }
}


