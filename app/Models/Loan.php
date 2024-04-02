<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'books_copies_id',
        'user_id',
        'librarian_id',
        'loan_date_at',
        'return_date_at'
    ];



public function copies(){
        return $this->belongsTo(BookCopie::class);
    }

public function user(){
    return $this->belongsTo(User::class);

}
public function librarian(){
    return $this->belongsTo(Librarian::class);
}

}