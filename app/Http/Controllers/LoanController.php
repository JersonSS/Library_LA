<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function all(){

        return Loan::all();
    }
    public function create(Request $request){

        Loan::create([  
            'books_copies_id' => $request->books_copies_id,
            'user_id' => $request->user_id,
            'librarian_id' => $request->librarian_id,
            'loan_date_at' => $request->loan_date_at,
            'return_date_at' => $request->return_date_at
        ]); 
    }

    public function update(Request $request, $id){
        $role = Loan::find($id);
        $role->update([
            'books_copies_id' => $request->input('books_copies_id'),
            'user_id' => $request->input('user_id'),
            'librarian_id' => $request->input('librarian_id'),
            'loan_date_at' => $request->input('loan_date_at'),
            'return_date_at' => $request->input('return_date_at'),
        ]);
    
        return response()->json(['message' => 'El Usuario a sido actualizado correctamente'], 201);
    }

}
