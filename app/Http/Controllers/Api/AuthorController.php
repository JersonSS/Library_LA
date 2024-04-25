<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Loan;
use App\Models\User;
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


    public function test(User $user)
    {
        //dd($user);
        //User::findOrFail($id);
        return Loan::where('user_id',$user->id)->get();


    }

}
