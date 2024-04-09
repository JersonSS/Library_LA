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

    }

}