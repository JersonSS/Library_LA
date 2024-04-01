<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function create(Request $request){

        Author::create([
            'name' => $request->name,
        ]);
    }

      public function all(){

        return Author::all();
        //return $authors->find(1);
    }
/*  
    public function update($id){
        Author::find($id);

        $id->update([
            'name' => $request->input('name'),
        ]);
    
    }
*/
}