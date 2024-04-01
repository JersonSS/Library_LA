<?php

namespace App\Http\Controllers;

use APP\Models\BookStatus;
use Illuminate\Http\Request;

class BookStatusController extends Controller
{
    public function create(Request $request){

        BookStatus::create([  
            'status'=>$request->status
        ]); 
    }
}
