<?php

namespace App\Services;

use App\Models\Book;

class BookServices
{

    public function bookInfo(){

        $books = Book::with(['author', 'genres'])->get();
        return $books;
    }

}
