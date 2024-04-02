<?php

namespace App\Http\Controllers;

use App\Models\BookStatus;
use Illuminate\Http\Request;

class BookStatusController extends Controller
{


    public function all(){

        return BookStatus::all();
    }
    public function create(Request $request){

        BookStatus::create([  
            'name' => $request->name,
        ]); 
    }
}
